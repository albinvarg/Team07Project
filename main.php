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
            <i class="fa fa-user"></i>
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
                            <p class="description">Bug Fixes</p>
                            <span>📅 July 22</span> <!-- this should changed later, it is the date for the tasks-->
                        </div>
                    </div>
                    <div class="card">
                        <p>Task 2</p>
                        <div class="details">
                            <p class="description">Bug Fixes</p>
                            <span>📅 Sep 29</span>
                        </div>
                    </div>
                    <div class="add-card" onclick="openPopUp()">+ Add a card</div>
                </div>
                
                <div class="column">
                    <h2>Doing</h2>
                    <div class="card">
                        <p>Task 3</p>
                        <div class="details">
                            <p class="description">Bug Fixes</p>
                            <span>📅 July 15</span> 
                        </div>
                    </div>
                    <div class="add-card" onclick="openPopUp()">+ Add a card</div>
                </div>

                <div class="column">
                    <h2>Done</h2>
                    <div class="card">
                        <p>Task 4</p>
                        <div class="details">
                            <p class="description">Bug Fixes</p>
                            <span>📅 June 18</span>
                        </div>
                    </div>
                    <div class="add-card" onclick="openPopUp()">+ Add a card</div>
                </div>
                

                 <!-- Pop up screen for when you add a new card --> 
                <div id="new-card-pop" class="new-card-pop">
                    <div class="pop-content">
                        <span class="close" onclick="closePopUp()">&times;</span>
                        <h2>Add a New Card</h2>
                        <form id="cardForm">
                            <label for="taskName">Task Name:</label>
                            <input type="text" id="taskName" name="taskName" value="Task 10" required>


                            <label for="category">Category:</label>
                            <select id="category" name="category" required>
                                <option value="" disabled selected>Select a category</option>
                                <option value="Cat1">Cat1</option>
                                <option value="Cat2">Cat2</option>
                                <option value="Cat3">Cat3</option>
                                <option value="Cat4">Cat4</option>
                            </select>

                            <label for="description">Description:</label>
                            <textarea id="description" name="description" rows="4" placeholder="Add a brief description..." required></textarea>

                            <label for="taskDate">Due Date:</label>
                            <input type="date" id="taskDate" name="taskDate" value="2023-02-03"required>

                            <button type="button" onclick="addCard()">Add Card</button>
                        </form>
                    </div>
                </div>


                <!-- Additional column for progress tracking -->
                <div class="column empty-column">
                    <h2>Progress Tracker</h2>
                    <div class="progress-checker">
                        <div id="progress-bar-container">
                            <div id="progress-bar"></div><!-- JavaScript needed to make progress bar change based on percentage -->
                        </div>
                        <p id="progress-percentage">20%</p> <!-- JavaScript needed to make percentage change based on tasks completed -->
                    </div>
                </div>
                

            </div>
        </section>
    </main>

    <script src="addCard.js"></script>
</body>
</html>