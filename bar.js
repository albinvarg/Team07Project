
function calculateProgress() {
    
// select the columns in order To Do, Doing, and Done
    const toDoTasks = document.querySelectorAll('#to-do-column .card');
    const doingTasks = document.querySelectorAll('#doing-column .card');
    const doneTasks = document.querySelectorAll('#done-column .card');

// get the total number of tasks
    const totalTasks = toDoTasks.length + doingTasks.length + doneTasks.length;

// count the number of tasks completed
    const completedTasks = doneTasks.length;

// calculate the tasks' progress percentage
    let progressPercentage = 0;
    if (totalTasks > 0) {
        progressPercentage = (completedTasks / totalTasks) * 100;
    }

// change the progress bar and percentage display
    const progressBar = document.getElementById('progress-bar');
    const progressText = document.getElementById('progress-percentage');

// change the width of the progress bar based on the percentage
    progressBar.style.width = progressPercentage + '%';

// manipulates the colour of the progress bar based on percentage
    if (progressPercentage === 0) {
    // no task started
        progressBar.style.backgroundColor = 'red';
    } else if (progressPercentage <= 49) {
    // less than 50% completed
        progressBar.style.backgroundColor = 'orange';
    } else if (progressPercentage > 49 && progressPercentage < 100) {
    // between 50% and 99%
        progressBar.style.backgroundColor = 'yellow';
    } else {
    // 100% completed
        progressBar.style.backgroundColor = 'green';
    }

    progressText.textContent = Math.round(progressPercentage) + '% ';
}

// call the calculateProgress function
document.addEventListener('DOMContentLoaded', calculateProgress);
