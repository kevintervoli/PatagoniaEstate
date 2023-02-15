async function getPropertiesAPI(data) {
  return fetch("http://localhost/PatagoniaEstate/API/users", {
    method: "GET",
    headers: {
      Accept: "application/json",
      "Content-Type": "application/json",
    },
    body: JSON.stringify(data),
  }).then((response) => {
    return response.json();
  });
}
// delete property
async function deletePropertyAPI(data) {
  let url = "http://localhost/PatagoniaEstate/API/users?id=" + data['id'] + "&username=" + data['username'];
    return fetch(url, {
        method: "DELETE",
        headers: {
          'Content-type': 'application/json; charset=UTF-8'
        },
        
    }).then((response) => {
        return response.json();
    });
}

function fillTable(tableElement, data) {
  data.forEach((property) => {
    console.log(property);
    const row = document.createElement("tr");
    row.innerHTML = `
            <td>${property.ID}</td>
            <td>${property.Name}</td>
            <td>${property.Surname}</td>
            <td>${property.Age}</td>
            <td>${property.Email}</td>
            <td>${property.Address}</td>
            <td>${property.username}</td>
            <td>${property.Password}</td>
            <td>${property.Status}</td>
        `;
    tableElement.appendChild(row);
  });
}

document.querySelector("#userForm").addEventListener("submit", (event) => {
  event.preventDefault();
  // get the button name from event
  const buttonName = event.submitter.name;
  if (buttonName === "fillButton") {
    const formData = new FormData(event.target);
    const data = Object.fromEntries(formData.entries());
    // clear the table
    document.querySelector("tbody").innerHTML = "";
    getPropertiesAPI().then((data) => {
      fillTable(document.querySelector("tbody"), data);
    });
  }
  else if (buttonName === "deleteButton") {
    const formData = new FormData(event.target);
    const data = Object.fromEntries(formData.entries());
    deletePropertyAPI(data).then((data) => {
      console.log(data);
    });
  }
  else if (buttonName === "add"){
    window.location.href = "./add_user.php";
  }
});