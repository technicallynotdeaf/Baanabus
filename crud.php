
<?php


function shrink($string) {
    // Remove all non-alphanumeric characters and spaces
    $shrinked_string = preg_replace('/[^a-zA-Z0-9]/', '', $string);
    return $shrinked_string;
}


/* $database should be a PDO sqlite handle; 
 * $task_id is an integer that matches task_id in the 'tasks' table */
function get_task($database, $task_id) {
  
    // in some cases, we might try getting $task['parent_task'] and this may be null or empty (thanks, sqlite)
    if($task_id == null) return null;
    if(empty($task_id)) return null;  
  
    try {
        $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      
        // Attempt to grab the task from the database by task_id
        $query = $database->prepare("SELECT * FROM tasks WHERE task_id = :task_id");
        $query->bindParam(':task_id', $task_id, PDO::PARAM_STR);
        $query->execute();
        $task = $query->fetch(PDO::FETCH_ASSOC);

        // If no incomplete task was found, it might be the task's habitica_id not the task_id
        if (!$task) {
            $query = $database->prepare("SELECT * FROM tasks WHERE habitica_id = :habitica_id");
            $query->bindParam(':habitica_id', $task_id, PDO::PARAM_STR);
            $query->execute();
            $task = $query->fetch(PDO::FETCH_ASSOC);
        }

        return $task;

    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
        return null;
    }
}

//ChatGPT-3.5 also wrote me this one and probably saved me an hour or three... 
function get_tasks($database, $filters) {
    try {
        $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Initialize an array to store the WHERE clause conditions
        $conditions = array();

        // Loop through the task parameters and build the WHERE clause
        foreach ($filters as $key => $value) {
            // Use parameter binding to prevent SQL injection
            $conditions[] = "$key = :$key";
        }

        // Construct the SQL query with the WHERE clause
        $sql = "SELECT * FROM tasks";
        if (!empty($conditions)) {
            $sql .= " WHERE " . implode(" AND ", $conditions);
        }
		 $sql .= " ORDER BY task_urgency DESC";
		 
        // Prepare and execute the SQL query
        $query = $database->prepare($sql);
        $query->execute($filters);

        // Fetch all matching tasks as associative arrays
        $tasks = $query->fetchAll(PDO::FETCH_ASSOC);

        return $tasks;

    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
        return array(); // Return an empty array on error
    }
}

// thankyou chatGPT4o
function get_people($database, $filters = null) {

	if($filters == null) {
		$filters = array();
	}

    try {
        $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Initialize an array to store the WHERE clause conditions
        $conditions = array();

        // Loop through the filters and build the WHERE clause
        foreach ($filters as $key => $value) {
            // Use parameter binding to prevent SQL injection
            $conditions[] = "$key = :$key";
        }

        // Construct the SQL query with the WHERE clause
        $sql = "SELECT * FROM people";
        if (!empty($conditions)) {
            $sql .= " WHERE " . implode(" AND ", $conditions);
        }
        $sql .= " ORDER BY person_id ASC";

        // Prepare and execute the SQL query
        $query = $database->prepare($sql);
        $query->execute($filters);

        // Fetch all matching people as associative arrays
        $people = $query->fetchAll(PDO::FETCH_ASSOC);

        return $people;

    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
        return array(); // Return an empty array on error
    }
}


// thankyou copilot
function is_scheduled($database, $task_id) {
    // Get today's date
    $today = date('Y-m-d');
	
	$found = false;

    // Prepare SQL statement
	try {
		$stmt = $database->prepare("SELECT * FROM diary WHERE date >= :today");
		$stmt->bindParam(':today', $today);
		$stmt->execute();

		// Fetch all rows
		$entries = $stmt->fetchAll(PDO::FETCH_ASSOC);
		
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
        return array(); // Return an empty array on error
    }

    // Check each entry
    foreach ($entries as $entry) {
        // Decode JSON array
        $task_queue = json_decode($entry['task_queue'], true);

        // Check if task_id is in task_queue
        if (is_array($task_queue) && in_array($task_id, $task_queue)) {
            $found = true; break;
        }
    }

    // If task_id is not found in any entry
    return $found;
}


// Thankyou ChatGPT and copilot - I fed it the get_task() function and asked for this one :) then copilot helped check for errant contexts from the tasks table
function get_contexts($database) {

	//let me macguyver this while i'm re-learning how to use the system!
	#$contexts = array("Home","Baanabus","PGS","Tech Career","Fire Church","STEM Ginger","365Life","Raise a Standard");
	
	#return $contexts;

    try {
        $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		

        $query = $database->prepare("SELECT DISTINCT context FROM tasks");
        $query->execute();

        // Fetch all contexts, including null values
        $taskcontexts = $query->fetchAll(PDO::FETCH_COLUMN);


        // Prepare the SQL query to fetch distinct contexts (including null values)
        $query2 = $database->prepare("SELECT DISTINCT context FROM contexts");
        $query2->execute();
		
        // Fetch all contexts, including null values
        $contexts = $query2->fetchAll(PDO::FETCH_COLUMN);

        // Filter out null contexts and those without alphanumeric characters
        $filteredContexts = array_filter($taskcontexts, function($context) {
            return $context !== null && preg_match('/[A-Za-z0-9]/', $context);
        });

        // Remove duplicates from the filtered array
        $uniqueContexts = array_values(array_unique($filteredContexts));

        // For each context in $uniqueContexts, check if it exists in the contexts table and if not, add it
        foreach ($uniqueContexts as $context) {
            if (!in_array($context, $contexts)) {
                $insert = $database->prepare("INSERT INTO contexts (context) VALUES (?)");
                $insert->execute([$context]);
            }
        }

        // Fetch all contexts again after insertion
        $query2->execute();
        $contexts = $query2->fetchAll(PDO::FETCH_COLUMN);

        return $contexts;
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
        return [];
    }
}



/* $database should be a PDO sqlite handle; 
 * $task_id is an integer that matches task_id in the 'tasks' table */
function get_all_tasks($database) {
    try {
      
        $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      
        // Attempt to grab the task from the database by task_id
        $query = $database->prepare("SELECT * FROM tasks ORDER BY task_urgency DESC");
        $query->execute();
        $tasks = $query->fetchAll(PDO::FETCH_ASSOC);

        return $tasks;

    } catch (PDOException $e) {
        echo 'Fetch_All Error: ' . $e->getMessage();
        return null;
    }
}

/* $database should be a PDO sqlite handle; 
 * $task_id is an integer that matches task_id in the 'tasks' table */
function get_incomplete_tasks($database) {
    try {
      
        $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      
        // Attempt to grab the task from the database by task_id
        $query = $database->prepare("SELECT * FROM tasks WHERE completed = 0 ORDER BY task_urgency DESC");
        $query->execute();
        $tasks = $query->fetchAll(PDO::FETCH_ASSOC);

        return $tasks;

    } catch (PDOException $e) {
        echo 'Fetch_All Error: ' . $e->getMessage();
        return null;
    }
}

/* $database should be a PDO sqlite handle; 
 * $task_id is an integer that matches task_id in the 'tasks' table */
function get_doable_tasks($database) {
    try {
        $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      
        // Adjust the SQL query to filter out tasks with a future show_after datetime
        // SQLite understands 'now' as the current datetime
        $query = $database->prepare("SELECT * FROM tasks WHERE completed = 0 AND (prereq_tasks IS NULL) AND (show_after <= CURRENT_TIMESTAMP OR show_after IS NULL) ORDER BY task_urgency DESC");
        $query->execute();
        $tasks = $query->fetchAll(PDO::FETCH_ASSOC);

        return $tasks;

    } catch (PDOException $e) {
        echo 'Fetch_All Error: ' . $e->getMessage();
        return null;
    }
}

function get_inbox_items($database) {
    try {
      
        $query = $database->prepare("SELECT * FROM inbox");
        $query->execute();
        $inbox = $query->fetchAll(PDO::FETCH_ASSOC);

        return $inbox;

    } catch (PDOException $e) {
        echo 'Fetch_All Inbox items Error: ' . $e->getMessage();
        return null;
    }
}
      


/* $database should be a PDO sqlite handle; 
 * $task_id is an integer that matches task_id in the 'tasks' table */
function get_subtasks($database, $task_id) {

    try {
        $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      
        // Attempt to grab the task from the database by task_id
        $query = $database->prepare("SELECT * FROM tasks WHERE parent_task = :task_id");
        $query->bindParam(':task_id', $task_id, PDO::PARAM_STR);
        $query->execute();
        $subtasks = $query->fetchAll(PDO::FETCH_ASSOC);

        return $subtasks;

    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
        return null;
    }
}


/* $database should be a PDO sqlite handle; 
 * $task_id is an integer that matches task_id in the 'tasks' table */
function mark_complete($database, $task_id) {
    try {
        // Connect to the SQLite database
        $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // === Step 1: Update Task in Local Database ===
        $updateQuery = $database->prepare("UPDATE tasks SET completed = 1 WHERE task_id = :task_id");
        $updateQuery->bindParam(':task_id', $task_id, PDO::PARAM_INT);
        $updateQuery->execute();

        // === Step 2: Check for Habitica Task ID and Update ===
        $habiticaSyncMessage = null;
        $query = $database->prepare("SELECT habitica_id FROM tasks WHERE task_id = :task_id");
        $query->bindParam(':task_id', $task_id, PDO::PARAM_INT);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);

        if ($result && isset($result['habitica_id'])) {
            $habiticaId = $result['habitica_id'];
            
            // Get Habitica user credentials from vault secrets
            include_once 'config_helper.php';
            $cassowary = getCassowary();
            $habiticaUserId = $cassowary['habitica']['user_id'] ?? null;
            $habiticaApiKey = $cassowary['habitica']['api_key'] ?? null;

            if ($habiticaUserId && $habiticaApiKey) {
                // Make the Habitica API request
                $updateCurl = curl_init();
                curl_setopt($updateCurl, CURLOPT_URL, "https://habitica.com/api/v3/tasks/{$habiticaId}/score/up");
                curl_setopt($updateCurl, CURLOPT_POST, true);
                curl_setopt($updateCurl, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($updateCurl, CURLOPT_HTTPHEADER, [
                    "x-api-user: $habiticaUserId",
                    "x-api-key: $habiticaApiKey",
                    "Content-Type: application/json"
                ]);

                $response = curl_exec($updateCurl);

                if ($response === false) {
                    $habiticaSyncMessage = '❌ Error updating Habitica: ' . curl_error($updateCurl);
                } else {
                    $responseData = json_decode($response, true);
                    if ($responseData['success'] === true) {
                        $habiticaSyncMessage = '✅ Task synced with Habitica successfully.';
                    } else {
                        $habiticaSyncMessage = '❌ Error from Habitica: ' . json_encode($responseData);
                    }
                }

                curl_close($updateCurl);
            } else {
                $habiticaSyncMessage = null;
            }
        }

        // === Step 3: Page Progress Logic ===
        $config = getConfig();
        
        // Get the current progress from config.json
        $currentPages = $config['progress']['pages'] ?? 0;
        $currentBooks = $config['progress']['books'] ?? 0;

        // Increment the page count
        $currentPages++;

        // If we've reached 30 pages, roll over to a new book
        if ($currentPages >= 30) {
            $currentPages = 0;
            $currentBooks++;
        }

        // === Sync to session and config ===
        $_SESSION['pages'] = $currentPages;
        $_SESSION['books'] = $currentBooks;
        $config['progress']['pages'] = $currentPages;
        $config['progress']['books'] = $currentBooks;
        saveConfig($config);

        // === Return JSON response ===
        echo json_encode([
            'success' => true,
            'pages' => $currentPages,
            'books' => $currentBooks,
            'habitica' => $habiticaSyncMessage
        ]);

    } catch (PDOException $e) {
        echo json_encode([
            'success' => false,
            'message' => $e->getMessage()
        ]);
    }
}



/* $database should be a PDO sqlite handle; 
 * $task_id is an integer that matches task_id in the 'tasks' table */
function delete_task($database, $task_id) {
    try {
      $subtasks = get_subtasks($database, $task_id);
      
      foreach($subtasks as $subtask) {
        delete_task($database, $subtask['task_id']);
      }
      
      // Connect to the SQLite database
      $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      // Update the completed status of the selected task
      $updateQuery = $database->prepare("DELETE FROM tasks WHERE task_id = $task_id");
      $updateQuery->execute();

      // if(DEBUG) echo "Task deleted. ";
      

  } catch (PDOException $e) {
      echo 'Error: ' . $e->getMessage();
  }
}

// Function to delete an item from the 'inbox' table safely
function delete_from_inbox($database, $inbox_id) {
    try {
        $sql = "DELETE FROM inbox WHERE item_id = :inbox_id";
        $stmt = $database->prepare($sql);
        $stmt->bindParam(':inbox_id', $inbox_id, PDO::PARAM_INT);
        $stmt->execute();

        echo "Inbox item deleted successfully!";
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }
}

function is_doable($database, $task) {

	 if ($task['completed'] == 1) {
			//echo "<p>Task done</p>";
			return false;
		}
	
	if(!empty($task['prereq_tasks'])) {
		 //echo "<p>Task has prerequisites</p>";
		return false;
	}
	
    if ($task['show_after'] > date('Y-m-d H:i:s') ) {
		//echo "<p>Task snoozed</p>";
		return false;
	}
	
	return true;
}

function display_task_list($database, $json_task_ids) {
    try {
        $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Decode the JSON-encoded array of task_ids
        $task_ids = json_decode($json_task_ids, true);

        // Initialize an array to store the WHERE clause conditions
        $conditions = array();

        // Loop through the task_ids and build the WHERE clause
        foreach ($task_ids as $id) {
            // Use parameter binding to prevent SQL injection
            $conditions[] = ":id_$id";
        }

        // Construct the SQL query with the WHERE clause
        $sql = "SELECT * FROM tasks WHERE task_id IN (" . implode(", ", $conditions) . ")";
        
        // Prepare the SQL query
        $query = $database->prepare($sql);

        // Bind the task_ids to the query
        foreach ($task_ids as $id) {
            $query->bindValue(":id_$id", $id, PDO::PARAM_INT);
        }

        // Execute the SQL query
        $query->execute();

        // Fetch all matching tasks as associative arrays
        $tasks = $query->fetchAll(PDO::FETCH_ASSOC);

        // Call display_task for each task
        foreach ($tasks as $task) {
            display_task($database, $task);
        }

    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }
}


/* this function expects the task as an associative-array */
function display_task($database, $task, $buttons = true, $call = 0) {
  
  if($task == null) { echo "Null task"; return; }
  
  if($call > 5) return; /* prevent infinite recursion*/

    echo '<div class="task-info-box">';


  //echo "Task type: " . $task['task_type'];
  //echo "<br>Task ID " . $task['task_id'];
  //if($task['habitica_id']) echo " / Habitica ID: " . $task['habitica_id'];
  
  if(isset($task['parent_task']) && !empty($task['parent_task']) && $call < 2) {
    
    $parent_task = get_task($database, $task['parent_task']);
    
    if($parent_task == null && $call < 1) 
    {
      echo " Parent task: " . $task['parent_task'] . " not found. ";
      $temp_task = array();
      $temp_task['task_id'] = $task['task_id'];
      $temp_task['parent_task'] = null; 
      update_task($database, $temp_task);
    }
    else if ($call < 1) echo "*This is a subtask of: " . $parent_task['task_title'] . "<br/>"; 
    // if($parent_task) display_task($database, $parent_task, true, $call);
  }
  
  echo '<div class="left-content">';
  
  if(isset($task['completed']) && $task['completed'] == 1) {
    $task['task_type'] = 'completed'; // this doesn't update back to the database - it is for display purposes
    // if($parent_task) display_task($database, $parent_task, true, $call);
  }
  
  if(is_scheduled($database, $task['task_id'])) { 
    $task['task_title'] = "**" . $task['task_title'];
  }
  
  // Assuming $task is the task data
  if ($task['completed']) {
      echo '<span class="completed">' . $task['task_title'] . '</span>';
  } else {
      echo '<label>';
      echo '<a href="?completed_task=' . $task['task_id'] . '"';
      echo '<input type="checkbox" name="completed_task" value="' . $task['task_id'] . '" class="task-checkbox" > </a>';
      if(isset($task['task_type'])) { 
        if($task['task_type'] === 'contact') {
          $person = get_person($database, $task['person_id']);
          echo "[contact " . $person['name']  . "]: "; 
        } else if($task['task_type'] === 'buy') {
          echo "[buy from " . $task['buy_from']  . "]: "; 
        } else {
          echo "[" . $task['task_type'] . "]: "; 
        }
      }
      echo $task['task_title'];
	  if(isset($task['tags'])) { 
          echo "[Tags: " . $task['tags'] . "]: "; 
      }
      echo '</label>';
  }
  
  echo '</div><div class="right-content">';
  
  if(!$task['completed']) {
    echo "&nbsp;&nbsp;" . get_urgency_string($database, $task['task_urgency']) . " ";
  }
  
  if($buttons) {
    echo '<a href="edit_task.php?task_id=' . $task['task_id'] . '" class="edit-link">Edit</a>';
    echo '<a href="?action=delete_task&task_id=' . $task['task_id'] . '" class="delete-link">Delete</a>';
  }
  echo '</div>'; // end right-content 

  
  $subtasks = get_subtasks($database, $task['task_id']);
  
  if($subtasks) {
    echo "<br>";
    foreach ($subtasks as $subtask) {
      $show_buttons = true;
      display_task($database, $subtask, $show_buttons, ($call + 1));
    }
  }
  
  
  echo "</div>";
}

/* this function expects the task as an associative-array */
function display_task_no_subtasks($database, $task, $buttons = true) {
  
    echo '<div class="task-info-box">';


  //echo "Task type: " . $task['task_type'];
  //echo "<br>Task ID " . $task['task_id'];
  //if($task['habitica_id']) echo " / Habitica ID: " . $task['habitica_id'];
  
  if(isset($task['parent_task']) && !empty($task['parent_task'])) {
    
    $parent_task = get_task($database, $task['parent_task']);
    
    if($parent_task == null) // $task['parent_task'] isn't empty but not in DB? set to null
    {
      //
      echo " Parent task: " . $task['parent_task'] . " not found. ";
      $temp_task = array();
      $temp_task['task_id'] = $task['task_id'];
      $temp_task['parent_task'] = null; 
      update_task($database, $temp_task);
    }
    else echo "*This is a subtask of: " . $parent_task['task_title'] . "<br/>"; 
  }
  
  echo '<div class="left-content">';
  
  if(isset($task['completed']) && $task['completed'] == 1) {
    $task['task_type'] = 'completed'; // this doesn't update back to the database.
  }
  
  // Assuming $task is the task data
  if ($task['completed']) {
      echo '<span class="completed">' . $task['task_title'] . '</span>';
  } else {
      echo '<label>';
      echo '<a href="?completed_task=' . $task['task_id'] . '"';
      echo '<input type="checkbox" name="completed_task" value="' . $task['task_id'] . '" class="task-checkbox" > </a>';
      if(isset($task['task_type'])) { echo "[" . $task['task_type'] . "]: "; }
      echo $task['task_title'];
      echo '</label>';
  }
  echo '</div><div class="right-content">';
  echo "&nbsp;&nbsp;" . get_urgency_string($database, $task['task_urgency']) . " ";
  
  if($buttons) {
    echo '<a href="edit_task.php?task_id=' . $task['task_id'] . '" class="edit-link">Edit</a>';
    echo '<a href="?action=delete_task&task_id=' . $task['task_id'] . '" class="delete-link">Delete</a>';
  }
  echo '</div>'; // end right-content 
  
  
  echo "</div>";
}

// Thanks, ChatGPT! 
// This function adds a nominated task_id to the task queue in the Diary table 
function add_to_date_tasks($database, $task_id, $date) {
    try {
        // First, check if a diary entry exists for the given date, insert if not
        $entry = insertDiaryEntryIfNotExists($database, $date);

        if (!$entry) {
            echo "Failed to insert or find an entry for the date: $date";
            return; // Early return if no entry could be ensured
        }

        // Prepare a SELECT statement to get the current task_queue for the given date
        $stmt = $database->prepare("SELECT task_queue FROM diary WHERE date = :date");
        $stmt->bindParam(':date', $date);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        // At this point, result must not be false because an entry is guaranteed
        // Decode the task_queue JSON string into a PHP array
        $taskQueue = json_decode($result['task_queue'], true);
        if (!is_array($taskQueue)) {
            $taskQueue = []; // Ensure $taskQueue is an array if it was null
        }

        // Add the task_id to the task queue array
        $taskQueue[] = $task_id;

        // Encode the updated task queue array back into a JSON string
        $taskQueueJson = json_encode($taskQueue);

        // Prepare an UPDATE statement to update the task_queue for the given date
        $updateStmt = $database->prepare("UPDATE diary SET task_queue = :taskQueue WHERE date = :date");
        $updateStmt->bindParam(':taskQueue', $taskQueueJson);
        $updateStmt->bindParam(':date', $date);
        $updateStmt->execute();
    } catch (PDOException $e) {
        // Handle any errors
        die("Error occurred: " . $e->getMessage());
    }
}

// thankyou CopilotGPT
function clean_up_tasks($database, $date) {
    try {
        // Prepare a SELECT statement to get the current task_queue for the given date
        $stmt = $database->prepare("SELECT task_queue FROM diary WHERE date = :date");
        $stmt->bindParam(':date', $date);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        // Decode the task_queue JSON string into a PHP array
        $taskQueue = json_decode($result['task_queue'], true);
        if (!is_array($taskQueue)) {
            $taskQueue = []; // Ensure $taskQueue is an array if it was null
        }

        // Create a new array to hold the cleaned tasks
        $cleanedTaskQueue = [];

        foreach ($taskQueue as $taskId) {
            $task = get_task($database, $taskId);

            // Check if the task is null or completed
            if (is_array($task) && $task['completed'] == 0) {
                // Check if this task is not already in the cleanedTaskQueue (avoid duplicates)
                if (!in_array($taskId, $cleanedTaskQueue)) {
                    $cleanedTaskQueue[] = $taskId;
                }
            }
        }

        // Encode the cleaned task queue array back into a JSON string
        $cleanedTaskQueueJson = json_encode($cleanedTaskQueue);

        // Prepare an UPDATE statement to update the task_queue for the given date
        $updateStmt = $database->prepare("UPDATE diary SET task_queue = :taskQueue WHERE date = :date");
        $updateStmt->bindParam(':taskQueue', $cleanedTaskQueueJson);
        $updateStmt->bindParam(':date', $date);
        $updateStmt->execute();
    } catch (PDOException $e) {
        // Handle any errors
        die("Error occurred: " . $e->getMessage());
    }
}


function insertDiaryEntryIfNotExists($database, $date) {
    // Prepare a SELECT statement to check if an entry already exists for the given date
    $checkQuery = $database->prepare("SELECT * FROM diary WHERE date = :date");
    $checkQuery->bindParam(':date', $date, PDO::PARAM_STR);
    $checkQuery->execute();
    
    $entry = $checkQuery->fetch(PDO::FETCH_ASSOC);
    
    if (!$entry) {
        // If no entry found, insert a new entry with the given date
        $insertQuery = $database->prepare("INSERT INTO diary (date) VALUES (:date)");
        $insertQuery->bindParam(':date', $date, PDO::PARAM_STR);
        $insertQuery->execute();

        // After inserting, attempt to read the newly-inserted entry
        $checkQuery->execute(); // Re-execute the check query to fetch the newly inserted entry
        $entry = $checkQuery->fetch(PDO::FETCH_ASSOC);
    }
    
    return $entry; // Return the entry, whether it was just inserted or already existed
}

//returns null if day not found
function getDayType($database, $date) {
    // Prepare a SELECT statement to check if an entry already exists for the given date
    $checkQuery = $database->prepare("SELECT day_type FROM diary WHERE date = :date");
    $checkQuery->bindParam(':date', $date, PDO::PARAM_STR);
    $checkQuery->execute();
    
    $entry = $checkQuery->fetch(PDO::FETCH_ASSOC);
    
    if (!$entry) {
		return null;
    }
	
	if(!isset($entry['day_type']) && $entry['day_type'] == null) return null;
    
    return $entry['day_type']; // Return day type if defined
}

//returns null if day not found
function getEnergyLevel($database, $date) {
    // Prepare a SELECT statement to check if an entry already exists for the given date
    $checkQuery = $database->prepare("SELECT energy_level FROM diary WHERE date = :date");
    $checkQuery->bindParam(':date', $date, PDO::PARAM_STR);
    $checkQuery->execute();
    
    $entry = $checkQuery->fetch(PDO::FETCH_ASSOC);
    
    if (!$entry) {
		return null;
    }
	
	if(!isset($entry['energy_level']) && $entry['energy_level'] == null) return null;
    
    return $entry['energy_level']; // Return day type if defined
}

/* $database should be a PDO sqlite handle; 
 * $person_id is an integer that matches person_id in the 'people' table */
function get_person($database, $person_id) {
    try {
        $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      
        // Attempt to grab the person from the database by person_id
        $query = $database->prepare("SELECT * FROM people WHERE person_id = :person_id");
        $query->bindParam(':person_id', $person_id, PDO::PARAM_STR);
        $query->execute();
        $person = $query->fetch(PDO::FETCH_ASSOC);

        return $person;

    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
        return null;
        return null;
    }
}

/* $database should be a PDO sqlite handle; 
 * $person_id is an integer that matches person_id in the 'people' table */
function get_notes($database, $person_id) {
    try {
        $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      
        // Attempt to grab the person from the database by person_id
        $query = $database->prepare("SELECT * FROM people_notes WHERE person_id = :person_id");
        $query->bindParam(':person_id', $person_id, PDO::PARAM_STR);
        $query->execute();
        $notes = $query->fetchAll(PDO::FETCH_ASSOC);

        return $notes;

    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
        return null;
        return null;
    }
}


// Function to update person's information in the database
function update_person($database, $person)
{

    // Prepare the SET clause for the UPDATE statement
    $setClause = implode(', ', array_map(function ($column) {
        return "$column = :$column";
    }, array_keys($person)));

    // Prepare the SQL UPDATE statement
    $sql = "UPDATE people SET $setClause WHERE person_id = :person_id";

    // echo "<br>SQL query: " . $sql;

    // Prepare and execute the SQL query
    $stmt = $database->prepare($sql);

    // Bind values for columns in the SET clause
    foreach ($person as $column => $value) {
        $stmt->bindValue(":$column", $value);
    }

    // Bind the person_id separately
    $stmt->bindParam(':person_id', $person['person_id'], PDO::PARAM_INT);

    // Execute the query and check if it was successful
    if ($stmt->execute()) {
        echo "Update successful!";
    } else {
        echo "Update failed: " . $stmt->errorInfo()[2];
    }

}

//thankyou openAI/ChatGPT:
function update_drops($database, $drop_count, $drop_cap)
{
    // Get the current date in Y-m-d format
    $today = date('Y-m-d');

    // Prepare the SQL UPDATE statement
    $sql = "UPDATE diary SET drop_count = :drop_count, drop_cap = :drop_cap WHERE date = :today";

    // Prepare and execute the SQL query
    $stmt = $database->prepare($sql);

    // Bind the drop_count, drop_cap, and date values
    $stmt->bindValue(':drop_count', $drop_count, PDO::PARAM_INT);
    $stmt->bindValue(':drop_cap', $drop_cap, PDO::PARAM_INT);
    $stmt->bindValue(':today', $today, PDO::PARAM_STR);

    // Execute the query and check if it was successful
    /*if ($stmt->execute()) {
        echo "Update successful!";
    } else {
        echo "Update failed: " . $stmt->errorInfo()[2];
    } */
}

//thankyou chatgpt:
function get_energy_level($database)
{
    // Get the current date in Y-m-d format
    $today = date('Y-m-d');


    // Prepare the SQL SELECT statement to get the energy_level from the diary table
    $sql = "SELECT energy_level FROM diary WHERE date = :today";

    // Prepare and execute the SQL query
    $stmt = $database->prepare($sql);
    $stmt->bindValue(':today', $today, PDO::PARAM_STR);

    // Execute the query
    if ($stmt->execute()) {
        // Fetch the energy_level
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result && isset($result['energy_level'])) {
            $energy_level = $result['energy_level'];

            // Prepare the SQL SELECT statement to get the details from the energy_levels table
            $sql = "SELECT energy_level, label, description FROM energy_levels WHERE energy_level = :energy_level";

            // Prepare and execute the SQL query
            $stmt = $database->prepare($sql);
            $stmt->bindValue(':energy_level', $energy_level, PDO::PARAM_INT);

            // Execute the query
            if ($stmt->execute()) {
                // Fetch and return the associative array
                $energy_details = $stmt->fetch(PDO::FETCH_ASSOC);
                if ($energy_details) {
                    return $energy_details;
                } else {
                    //echo "No energy level details found for energy level: $energy_level";
                }
            } else {
                echo "database error @2938374 -" . $stmt->errorInfo()[2];
            }
        } else {
            // if(DEBUG) { echo "<p>(debug) No energy level found for today.</p>"; }
        }
    } else {
        if(DEBUG) { echo "(debug) db error @983487 " . $stmt->errorInfo()[2]; }
    }

    return null;
}

//thankyou chatgpt... 
function get_day_type($database, $date = null)
{
    // Check if date is provided
    if ($date === null) {
        // Get the current date in Y-m-d format
        $today = date('Y-m-d');
    } else {
        // Cast the provided date to Y-m-d format
        $today = date('Y-m-d', strtotime($date));
    }
	
    // Prepare the SQL SELECT statement to get the day_type from the diary table
    $sql = "SELECT day_type FROM diary WHERE date = :today";

    // Prepare and execute the SQL query
    $stmt = $database->prepare($sql);
    $stmt->bindValue(':today', $today, PDO::PARAM_STR);

    // Execute the query
    if ($stmt->execute()) {
        // Fetch the day_type
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result && isset($result['day_type'])) {
            $day_type = $result['day_type'];

            // Prepare the SQL SELECT statement to get the details from the day_types table
            $sql = "SELECT day_type, label, description FROM day_types WHERE day_type = :day_type";

            // Prepare and execute the SQL query
            $stmt = $database->prepare($sql);
            $stmt->bindValue(':day_type', $day_type, PDO::PARAM_INT);

            // Execute the query
            if ($stmt->execute()) {
                // Fetch and return the associative array
                $day_details = $stmt->fetch(PDO::FETCH_ASSOC);
                if ($day_details) {
                    return $day_details;
                } else {
                    echo "No day type details found for day type: $day_type";
                }
            } else {
                echo "Failed to retrieve day type details: " . $stmt->errorInfo()[2];
            }
        } else {
            echo "No day type found for today.";
        }
    } else {
        echo "Failed to retrieve today's day type: " . $stmt->errorInfo()[2];
    }

    return null;
}


// Thankyou BingGPT xx
function get_random_quote($database) {

	try {
		// Query to get all quotes
		$quotesQuery = $database->query("SELECT quote FROM quotes");
		$quotes = $quotesQuery->fetchAll(PDO::FETCH_COLUMN, 0);

		// Check if there are any quotes
		if (count($quotes) > 0) {
			// Select a random quote
			$randomQuote = $quotes[array_rand($quotes)];

			return $randomQuote;
		} else {
			return "No quotes found in the database.";
		}
	
	} catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
        return null;
        return null;
    }
}


// Function to update person's information in the database
function update_task($database, $task)
{
      // Prepare the SET clause for the UPDATE statement
      $setClause = implode(', ', array_map(function ($column) {
          return "$column = :$column";
      }, array_keys($task)));

      // Prepare the SQL UPDATE statement
      $sql = "UPDATE tasks SET $setClause WHERE task_id = :task_id";

      // echo "<br>SQL query: " . $sql;

      // Prepare and execute the SQL query
      $stmt = $database->prepare($sql);
      $stmt->execute($task);

      // echo 'HF: Task updated successfully!';
}

// thankyou CopilotGPT
function archive_diary_entry($database, $archivedb, $diary)
{
    // Prepare the SET clause for the INSERT statement
    $columns = implode(', ', array_keys($diary));
    $values = ':' . implode(', :', array_keys($diary));

    // Prepare the SQL DELETE statement for the original database
    $deleteSql = "DELETE FROM diary WHERE date = :date";

    // Prepare the SQL INSERT statement for the archive database
    $insertSql = "INSERT INTO diary ($columns) VALUES ($values)";

    // Start transaction
    $database->beginTransaction();
    $archivedb->beginTransaction();

    try {
        // Prepare and execute the SQL query for the original database
        $deleteStmt = $database->prepare($deleteSql);
        $deleteStmt->execute(['date' => $diary['date']]);

        // Prepare and execute the SQL query for the archive database
        $insertStmt = $archivedb->prepare($insertSql);
        $insertStmt->execute($diary);

        // Commit the transaction
        $database->commit();
        $archivedb->commit();

        echo 'Diary entry archived successfully!';
    } catch (Exception $e) {
        // Rollback the transaction in case of an error
        $database->rollBack();
        $archivedb->rollBack();

        echo "Failed to archive diary entry: " . $e->getMessage();
    }
}

// thankyou again copilotGPT
function archive_person($database, $archivedb, $person_id)
{
    // SQL statement to update is_active to false (0)
    $updateSql = "UPDATE people SET is_active = 0 WHERE person_id = :person_id";

    // Start transaction
    $database->beginTransaction();

    try {
        // Prepare and execute the SQL query for the main database
        $updateStmt = $database->prepare($updateSql);
        $updateStmt->execute(['person_id' => $person_id]);

        // Commit the transaction
        $database->commit();

        echo 'Person archived successfully!';
    } catch (Exception $e) {
        // Rollback the transaction in case of an error
        $database->rollBack();

        echo "Failed to archive person: " . $e->getMessage();
    }
}

//#thankyou openAI chatGPT4o 
function unarchive_person($database, $archivedb, $person)
{
    // SQL statement to update is_active status to true (1)
    $updateSql = "UPDATE people SET is_active = 1 WHERE person_id = :person_id";

    // Start transaction
    $database->beginTransaction();

    try {
        // Prepare and execute the SQL query
        $updateStmt = $database->prepare($updateSql);
        $updateStmt->execute([
            'person_id' => $person['person_id']
        ]);

        // Commit the transaction
        $database->commit();
        echo 'Person restored successfully!';
    } catch (Exception $e) {
        // Rollback the transaction in case of an error
        $database->rollBack();

        echo "Failed to restore person: " . $e->getMessage();
    }
}



function checkHabiticaTaskExists($taskId, $userId, $apiKey) {
    $curl = curl_init();

    curl_setopt_array($curl, [
        CURLOPT_URL => "https://habitica.com/api/v3/tasks/$taskId",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTPHEADER => [
            "x-client: $userId-CustomScript",
            "x-api-user: $userId",
            "x-api-key: $apiKey",
        ],
    ]);

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        echo "cURL Error #:" . $err;
        return false;
    } else {
        $data = json_decode($response, true);
        // Check if the task exists or if an error was returned
        return isset($data['data']) && !isset($data['error']);
    }
}

// Thankyou ChatGPT...! 
function get_urgency_string($database, $urgencyLevel) {
  
    if($urgencyLevel == '') return "";
  
    try {
        $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Prepare the SQL query to fetch the display_name based on urgency_level
        $query = $database->prepare("SELECT display_name FROM urgency WHERE urgency_level = :urgencyLevel");
        $query->bindParam(':urgencyLevel', $urgencyLevel, PDO::PARAM_INT);
        $query->execute();

        // Fetch the display_name from the result
        $result = $query->fetch(PDO::FETCH_ASSOC);

        if ($result !== false && isset($result['display_name'])) {
            return $result['display_name'];
        } else {
            return "Urgency level not found"; // or handle it differently based on your needs
        }
    } catch (PDOException $e) {
        return "Error: " . $e->getMessage();
    }
}

// thankyou bing copilot <3
function check_prereq_tasks($database, $task) {
    // Initialize the count of prerequisite tasks
    $prereq_task_count = 0;

    // Check if prereq_tasks is not null or an empty string
    if ($task['prereq_tasks'] != null && $task['prereq_tasks'] != '') {
        // Decode the JSON array
        $prereq_tasks = json_decode($task['prereq_tasks'], true);

        // Check if JSON decode was successful
        if (json_last_error() == JSON_ERROR_NONE && is_array($prereq_tasks)) {
            // Array to hold tasks that are not completed
            $not_completed_tasks = array();

            // Iterate over tasks
            foreach ($prereq_tasks as $prereq_task) {
                // Check if task is completed
                if ($prereq_task['completed'] == 0) {
                    // If task is not completed, add it to the not_completed_tasks array
                    $not_completed_tasks[] = $prereq_task;
                }
            }

            // If there are no tasks left in the array, set prereq_tasks to null
            if (empty($not_completed_tasks)) {
                $task['prereq_tasks'] = null;
            } else {
                // If there are still tasks in the array, update the task's prereq_tasks field with the not_completed_tasks array
                $task['prereq_tasks'] = json_encode($not_completed_tasks);
                $prereq_task_count = count($not_completed_tasks);
                return $prereq_task_count;
            }

            // Write the updated task back to the database
            // You'll need to replace this with your actual database update code
            update_database($database, $task);
        }
    }

    // Return the count of prerequisite tasks
    return $prereq_task_count;
}

function review_complete($database, $person)
{
    // Get the review interval in days from $person
    $reviewInterval = $person['review_interval'];
	
	if(empty($reviewInterval)) {
		echo "Can't mark review complete with no interval.";
		return;
	}

    // Calculate the next review date by adding the review interval to today
    $today = new DateTime();
    $nextReviewDate = $today->modify("+$reviewInterval days");

    // Update the person's next review date in the database
    $sql = "UPDATE people SET next_review = :next_review WHERE person_id = :person_id";
    $stmt = $database->prepare($sql);

    try {
        // Execute the SQL update statement
        $stmt->execute([
            'next_review' => $nextReviewDate->format('Y-m-d'),
            'person_id' => $person['person_id']
        ]);

        echo "{$person['name']}'s next review is scheduled for " . $nextReviewDate->format('Y-m-d');
    } catch (Exception $e) {
        echo "Failed to update next review date: " . $e->getMessage();
    }
}

function snooze_1day($database, $person)
{
    // snooze til tomorrow i.e. in one day
    $reviewInterval = 1;

    // Calculate the next review date by adding the review interval to today
    $today = new DateTime();
    $nextReviewDate = $today->modify("+$reviewInterval days");

    // Update the person's next review date in the database
    $sql = "UPDATE people SET next_review = :next_review WHERE person_id = :person_id";
    $stmt = $database->prepare($sql);

    try {
        // Execute the SQL update statement
        $stmt->execute([
            'next_review' => $nextReviewDate->format('Y-m-d'),
            'person_id' => $person['person_id']
        ]);

        echo "{$person['name']}'s next review is scheduled for " . $nextReviewDate->format('Y-m-d');
    } catch (Exception $e) {
        echo "Failed to update next review date: " . $e->getMessage();
    }
}
