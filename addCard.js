let currentColumn; // Variable to store the currently selected column

// Function to open the pop-up and set the current column
function openPopUp(event) {
    document.getElementById("new-card-pop").style.display = "flex";

    // Set currentColumn to the parent column of the clicked "Add a card" button
    //currentColumn = event.target.closest(".column");
}

// Function to close the pop-up
function closePopUp() {
    document.getElementById("new-card-pop").style.display = "none";
    currentColumn = null; // Reset the current column
}

// Function to add a new card to the current column with formatted date
function addCard() {
    const taskName = document.getElementById("taskName").value;
    const taskDate = document.getElementById("taskDate").value;
    const taskDescription = document.getElementById("description").value;
    const taskCategory = document.getElementById("category").value;
    // console.log(taskName);
    // console.log(taskDate);

    if (taskName && taskDate&& taskDescription && taskCategory) {
        // post the task data to the api
        fetch("./add_card_api.php", {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json'
          },
          body: JSON.stringify({
            name: taskName,
            date: taskDate,
            description: taskDescription,
            category: taskCategory
          }
      )
      })
        .then(response => {
          if (!response.ok) csonsole.error("respoonse not ok");
          return response.json();
        })
        .then(data => {
          console.log("POST Response:", data);
        })
        .catch(error => {
          console.error('Fetch error:', error);
        });

      /*

        const newCard = document.createElement("div");
        newCard.className = "card";
        
        // Format the date as Month/Day (e.g., "Jan 1")
        const formattedDate = new Date(taskDate).toLocaleDateString('en-US', {
            month: 'short',
            day: 'numeric'
        });

        newCard.innerHTML = `
            <p>${taskName}</p>
            <div class="details">
                <p class="description">${taskDescription}</p>
                <span>📅 ${formattedDate}</span>
            </div>
        `;

        // Insert the new card before the "Add a card" button in the current column
        currentColumn.querySelector(".add-card").before(newCard);

        // Close the pop-up and reset the form
        closePopUp();
        document.getElementById("cardForm").reset();
    */
    }
}

// Close the pop-up when clicking outside of it
window.onclick = function(event) {
    const popUp = document.getElementById("new-card-pop");
    if (event.target == popUp) {
        closePopUp();
    }
}
