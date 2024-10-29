async function fetchProgress(id) {
    const response = await fetch(`/Team07Project/todo_list_api.php?employee_id=${id}`)
    const taskData = await response.json();
    console.log(taskData);
}

fetchProgress(0);