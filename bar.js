async function fetchProgress(id) {
    // Manager output is a dict of employees : array of tasks
    // Employee output is array of tasks

    //const response = await fetch(`/Team07Project/todo_list_api.php?employee_id=${id}`)
    const response = await fetch(`./todo_list_api.php?employee_id=${id}`);
    const taskData = await response.json();
    console.log(taskData);

    // Individual
    // const totalTasks = taskData.length;
    // const completedTasks = taskData.filter(task => task.status === "started").length;
    
    // const percentage = (completedTasks == 0) ?  0 : completedTasks / totalTasks
    // console.log(percentage * 100);

    // Total
    var totalTasks = 0;
    var completedTasks = 0;

    for (const key in taskData) {
      if (key === "role") {
        continue;
      }
      totalTasks++;
      if (taskData[key].status === "'completed'") {
        completedTasks++;
      }
    }


    const percentage = (completedTasks == 0) ?  0 : completedTasks / totalTasks
    // const percentage = 0.9
    console.log(totalTasks);
    console.log(completedTasks);

    console.log(percentage * 100);

    const percentageDisplay = document.getElementById('progress-percentage');
    percentageDisplay.textContent = (Math.round(percentage * 100)) + "%";

    const progressBar = document.getElementById('progress-bar');
    progressBar.style.width = (Math.round(percentage * 100)) + "%";

    if (percentage < 0.4) {
        progressBar.style.backgroundColor = '#ff1100';
    } else if (percentage < 0.7) {
        progressBar.style.backgroundColor = '#ff7300';
    } else {
        progressBar.style.backgroundColor = '#55ff00';
    }


}

async function fetchManagerProgress(id) {
  
  const response = await fetch(`./todo_list_api?employee_id=${id}`);
  const taskData = await response.json();

  
  
}

