
function fetch_todo_data(user_id) {
  fetch(`http://localhost:8000/todo_list_api.php?employee_id=${user_id}`)
    .then(response => response.json())
    .then(data => console.log(data))
    .catch(error => console.error('Error: ', error));
}



function post_new_task()
