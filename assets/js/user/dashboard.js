import { controller } from "./userController.js";

$(() => {
  var baseUrl = document.getElementById("mainNav").dataset["base_url"];
  const EMAIL_REGX = /[^@ \t\r\n]+@[^@ \t\r\n]+\.[^@ \t\r\n]+/;

  $("#grid_table").jsGrid({
    height: "auto",
    width: "100%",

    inserting: true,
    editing: true,
    paging: true,
    autoload: true,

    pageSize: 10,
    pageButtonCount: 3,

    deleteConfirm: "Do you really want to delete the User?",

    controller: controller,

    fields: [
      { name: "name", title: "Name", type: "text", validate: "required" },

      {
        name: "email",
        title: "Email",
        type: "text",
        validate: "required",
        width: 200,
        validate: { validator: "pattern", param: EMAIL_REGX },
      },

      {
        name: "password",
        title: "Password",
        type: "text",
        validate: "required",
        editing: false,
        width: 500,
      },

      { type: "control" },
    ],
  });
});
