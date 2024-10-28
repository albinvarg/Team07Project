<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Done & Dusted</title>
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>


<body>
    <header class="header">

    <nav class="navbar">
       <a href="#home"></a> <!-- this is where the logo/name will go -->

       <div class="navbar-right">
            <div class="dropdown"> <!-- this is the filter option, we won't implement the filters in the prototype -->
                <span class="dropdown-toggle">
                    <i class="fa fa-filter"></i> Filter
                </span>
                <div class="dropdown-menu">
                    <a href="#filter1">Option 1</a> <!-- for prototype only -->
                    <a href="#filter2">Option 2</a>
                    <a href="#filter3">Option 3</a>
                </div>
            </div>
            
            <div class="profile-icon">
            <i class="fa fa-user"></i> <!-- Replace "profile-icon.png" with whatever the image is -->
                <div class="profile-menu">
                    <span class="username">username</span>
                    <a href="#logout">Logout</a>
                </div>
            </div>

       </div>  
    </nav>
    </header>

    <main>
        <section class="task-board">
            <div class="board">
                <div class="column">
                    <h2>To Do</h2>
                    <div class="card">
                        <p>Task 1</p> <!-- The names of the tasks should be here -->
                        <div class="details">
                            <span>👤 2</span> <!-- this can be replaced with the number of people -->
                            <span>📅 July 22</span> <!-- this should changed later, it is the date for the tasks-->
                        </div>
                    </div>
                    <div class="card">
                        <p>Task 2</p>
                        <div class="details">
                            <span>👤 1</span>
                            <span>📅 Sep 29</span>
                        </div>
                    </div>
                    <div class="add-card">+ Add a card</div>
                </div>
                
                <div class="column">
                    <h2>Doing</h2>
                    <div class="card">
                        <p>Task 3</p>
                        <div class="details">
                            <span>👤 3</span>
                            <span>📅 July 15</span> 
                        </div>
                    </div>
                    <div class="add-card">+ Add a card</div>
                </div>

                <div class="column">
                    <h2>Done</h2>
                    <div class="card">
                        <p>Task 4</p>
                        <div class="details">
                            <span>👤 2</span>
                            <span>📅 June 18</span>
                        </div>
                    </div>
                    <div class="add-card">+ Add a card</div>
                </div>


                 <!-- Additional column for progress tracking -->
                 <div class="column empty-column">
                    <h2>Progress Tracker</h2>
                    <div class="progress-checker">
                        <div class="progress-bar" id="progress-bar">68%</div> <!-- JavaScript needed to make progress bar change based on percentage -->
                    </div>
                </div>


            </div>
        </section>
    </main>







</body>
</html>