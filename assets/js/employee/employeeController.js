const ENDPOINT =
  document.getElementById("mainNav").dataset["base_url"] + "employee";

export const controller = {
  loadData: () =>
    fetch(ENDPOINT + "/getEmployees", {
      headers: {
        "X-Requested-With": "XMLHttpRequest",
      },
    }).then((response) => response.json()),

  insertItem: (item) =>
    fetch(ENDPOINT + "/addEmployee", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
        "X-Requested-With": "XMLHttpRequest",
      },
      body: JSON.stringify(item),
    }).then((response) => response.json()),

  updateItem: (item) =>
    fetch(ENDPOINT + "/modifyEmployee", {
      method: "PUT",
      headers: {
        "Content-Type": "application/json",
        "X-Requested-With": "XMLHttpRequest",
      },
      body: JSON.stringify(item),
    }).then((response) => response.json()),

  deleteItem: (item) =>
    fetch(ENDPOINT + `/deleteEmployee/${item["id"]}`, {
      method: "DELETE",
      headers: {
        "X-Requested-With": "XMLHttpRequest",
      },
    }),
};
