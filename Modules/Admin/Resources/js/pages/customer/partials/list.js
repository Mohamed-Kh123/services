const resource = "customer";
const columns = [
    {
        text: "id",
        value: "id",
    },
    {
        text: "name",
        value: "name",
    },
    {
        text: "email",
        value: "email",
    },
    {
        text: "mobile",
        value: "mobile",
    },
];
const config = {
    importBtn: false,
    pdfBtn: false,
    excelBtn: false,
    createBtn: false,
}


const filters = [
    // {
    //     component: "input",
    //     model: "name_email",
    //     label: "name_email",
    //     cols: 4,
    //
    // },
    // {
    //     component: "select",
    //     model: "role",
    //     label: "role",
    //     cols: 4,
    //     endPoint: {name: 'role.index', params: {no_pagination: true}},
    //
    // },
];

const actions = [
    // {
    //     slug: "edit",
    //     color: "success",
    // },
    // {
    //     slug: "delete",
    //     color: "danger",
    //
    // }
];

export {
    resource,
    filters,
    columns,
    config,
    // importing,
    // exporting,
    actions
}
