function taskGraph(data) {
    const keys = Object.keys(data);
    const lengths1 = Object.values(data).map(value => {
        if (Array.isArray(value)) {
            console.log(value)
            const compCount = value.filter(item => item && item['status'] == "'completed'");
            console.log(compCount);
            return value.filter(item => item && item['status'] == "'completed'").length;
        } else if (value && value['status'] === "'completed'") {
            console.log(value)
            return 1;
        }
        return 0;
    })
    const lengths2 = Object.values(data).map(value => {
        if (Array.isArray(value)) {
            console.log(value)
            const compCount = value.filter(item => item && item['status'] == "'started'");
            console.log(compCount);
            return value.filter(item => item && item['status'] == "'started'").length;
        } else if (value && value['status'] === "'started'") {
            console.log(value)
            return 1;
        }
        return 0;
    })
    const lengths3 = Object.values(data).map(value => {
        if (Array.isArray(value)) {
            console.log(value)
            const compCount = value.filter(item => item && item['status'] == "'not started'");
            console.log(compCount);
            return value.filter(item => item && item['status'] == "'not started'").length;
        } else if (value && value['status'] === "'not started'") {
            console.log(value)
            return 1;
        }
        return 0;
    })

    
    const canvas = document.createElement('canvas');
    canvas.id = 'myChart';

    const content_box = document.querySelector('.tab-content');

    const context = document.createElement('h4');
    context.textContent = "test";
    content_box.appendChild(context);

    content_box.appendChild(canvas);
    const ctx = document.getElementById('myChart');
    
      new Chart(ctx, {
        type: 'bar',
        data: {
            labels: keys,
            datasets: [
                {
                label: 'Tasks not yet started',
                data: lengths3,
                backgroundColor: '#ff0000',
            },
            {
            label: 'Tasks started',
                data: lengths2,
                backgroundColor: '#ff8000',
            },
            {
            label: 'Completed Tasks',
            data: lengths1,
            backgroundColor: '#1bd14c',
        },]
        },
        options: {
            scales: {
                y: {
                    stacked: true,
                    beginAtZero: true,
                    ticks: {
                        precision: 0,
                    },
                    title: {
                        display: true,
                        text: 'Number of tasks'
                    }
                },
                x: {
                    stacked: true,
                    title: {
                        display: true,
                        text: 'Employees'
                    }
                }
            }
        }
    });
};

async function fetchData() {

    const response = await fetch(`/Team07Project/todo_list_api.php?employee_id=${0}`)
    const taskData = await response.json();
    console.log(taskData);

    taskGraph(taskData);
}

document.addEventListener('DOMContentLoaded', fetchData);