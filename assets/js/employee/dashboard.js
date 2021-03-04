import { controller } from "./employeeController.js";

$(() => {
  var baseUrl = document.getElementById("mainNav").dataset["base_url"];
  const EMAIL_REGX = /[^@ \t\r\n]+@[^@ \t\r\n]+\.[^@ \t\r\n]+/;
  const PCODE_REGX = /^[0-9]{5,9}$/;
  const PHONE_REGX = /^[0-9]{9,12}$/;
  const onRowClick = (args) => {
    let id = args.item.id;
    location.href = `${baseUrl}employee/show/${id}`;
  };

  $("#grid_table").jsGrid({
    height: "auto",
    width: "100%",

    inserting: true,
    paging: true,
    autoload: true,

    pageSize: 10,
    pageButtonCount: 3,

    deleteConfirm: "Do you really want to delete the Employee?",

    controller: controller,

    rowClick: onRowClick,

    fields: [
      { name: "name", title: "Name", type: "text", validate: "required" },
      {
        name: "email",
        title: "Email",
        type: "text",
        validate: "required",
        width: 150,
        validate: { validator: "pattern", param: EMAIL_REGX },
      },
      {
        name: "age",
        title: "Age",
        type: "number",
        validate: ["required", { validator: "range", param: [16, 70] }],
      },

      {
        name: "streetAddress",
        title: "Street Address",
        type: "text",
        validate: "required",
      },

      { name: "city", title: "City", type: "text", validate: "required" },

      { name: "state", title: "State", type: "text", validate: "required" },

      {
        name: "postalCode",
        title: "Postal Code",
        type: "number",
        validate: { validator: "pattern", param: PCODE_REGX },
      },
      {
        name: "phoneNumber",
        title: "Phone Number",
        type: "number",
        validate: { validator: "pattern", param: PHONE_REGX },
      },

      { type: "control", editButton: false },
    ],
  });
});
