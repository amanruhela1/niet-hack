const machinesList = document.querySelector("#volunteers-list");
const searchInput = document.querySelector("#search-input");
const addForm = document.querySelector("#add-form");

// Load machines data on page load
loadMachines();

// Event listener for search input
searchInput.addEventListener("input", searchMachines);

// Event listener for add form submit
addForm.addEventListener("submit", addMachine);

// Function to load machines data using AJAX
function loadMachines() {
  // Send GET request to machines.php to fetch machines data
  fetch("volunteers.php")
    .then(response => response.json())
    .then(data => {
      // Clear previous data from machines list
      machinesList.innerHTML = "";

      // Loop through machines data and create table rows
      data.forEach(machine => {
        const tr = document.createElement("tr");
        tr.innerHTML = `
          <td>${machine.id}</td>
          <td>${machine.name}</td>
          <td>${machine.number}</td>
          <td>${machine.address}</td>
          <td>${machine.description}</td>
          <td> ${machine.latitude} ${machine.longitude}</td>
          <td><button onclick="viewLocation(${machine.latitude}, ${machine.longitude})">View Location</button></td>
          <td> <button class="edit-btn" onclick="openEditForm(<?php echo $row['id']; ?>)" data-id="${machine.id}">Edit</button> </td>
          <td> <button class="delete-btn" data-id="${machine.id}">Delete</button> </td>
        `;
        machinesList.appendChild(tr);
      });
    })
    .catch(error => {
      console.error(error);
      machinesList.innerHTML = "<tr><td colspan='4'>Failed to load doctors data</td></tr>";
    });
}
    function viewLocation(latitude, longitude) {
      // Open a new window to display the map
      window.open(`https://www.google.com/maps?q=${latitude},${longitude}`);
    }

// Function to search machines data
function searchMachines() {
  const searchValue = searchInput.value.trim().toLowerCase();

  // Loop through machines table rows and hide/show based on search input
  machinesList.querySelectorAll("tr").forEach(tr => {
    const id = tr.querySelector("td:first-child").textContent.trim().toLowerCase();
    const name = tr.querySelector("td:nth-child(2)").textContent.trim().toLowerCase();

    if (id.includes(searchValue) || name.includes(searchValue)) {
      tr.style.display = "";
    } else {
      tr.style.display = "none";
    }
  });
}

// Function to add new machine
function addMachine(event) {
  event.preventDefault();
  
  const name = addForm.querySelector("#name").value.trim();
  const description = addForm.querySelector("#description").value.trim();

  // Send POST request to machines.php to add new machine
  fetch("machines.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/json"
    },
    body: JSON.stringify({
      name: name,
      description: description
    })
  })
    .then(response => {
      if (response.ok) {
        // Reload machines data on success
        loadMachines();
        // Clear form inputs
        addForm.reset();
      } else {
        throw new Error("Failed to add machine");
      }
    })
    .catch(error => {
      console.error(error);
      alert("Failed to add machine");
    });
}

// Event listener for edit and delete buttons using event delegation
machinesList.addEventListener("click", event => {
  if (event.target.classList.contains("edit-btn")) {
    const id = event.target.dataset.id;
    const name = prompt("Enter new machine name:");
    const number = prompt("Enter new machine number:");
    const address = prompt("Enter new machine adress");

    // Send PUT request to machines.php to update machine
    fetch(`volunteers.php?id=${id}`, {
      method: "PUT",
      headers: {
        "Content-Type": "application/json"
      },
      body: JSON.stringify({
        name: name,
        number: number,
        address: address
      })
    })
      .then(response => {
        if (response.ok) {
          // Reload machines data on success
          loadMachines();
          } else {
          throw new Error("Failed to update machine");
          }
          })
          .catch(error => {
          console.error(error);
          alert("Failed to update machine");
          });
          } else if (event.target.classList.contains("delete-btn")) {
          if (confirm("Are you sure you want to delete this machine?")) {
          const id = event.target.dataset.id;
            // Send DELETE request to machines.php to delete machine
  fetch(`volunteers.php?id=${id}`, {
    method: "DELETE"
  })
    .then(response => {
      if (response.ok) {
        // Reload machines data on success
        loadMachines();
      } else {
        throw new Error("Failed to delete machine");
      }
    })
    .catch(error => {
      console.error(error);
      alert("Failed to delete machine");
    });
  }
}
});