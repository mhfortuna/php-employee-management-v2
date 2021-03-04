const ENDPOINT =
  document.getElementById("mainNav").dataset["base_url"] + "user";

export const controller = {
  loadData: () =>
    fetch(ENDPOINT + "/getUsers", {
      headers: {
        "X-Requested-With": "XMLHttpRequest",
      },
    }).then((response) => response.json()),

  insertItem: (item) =>
    fetch(ENDPOINT + "/addUser", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
        "X-Requested-With": "XMLHttpRequest",
      },
      body: JSON.stringify(item),
    }).then((response) => response.json()),

  updateItem: (item) =>
    fetch(ENDPOINT + "/updateUser", {
      method: "PUT",
      headers: {
        "Content-Type": "application/json",
        "X-Requested-With": "XMLHttpRequest",
      },
      body: JSON.stringify(item),
    }).then((response) => response.json()),

  deleteItem: (item) =>
    fetch(ENDPOINT + `/deleteUser/${item["id"]}`, {
      method: "DELETE",
      headers: {
        "X-Requested-With": "XMLHttpRequest",
      },
    }),
};
