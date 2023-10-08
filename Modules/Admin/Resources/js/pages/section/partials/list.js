const resource = "section";
const columns = [
    {
        text: "id",
        value: "id",
    },
    {
        text: "image",
        value: "image_url",
        component: "image-holder",
    },
    {
        text: "is_active",
        value: "is_active",
        name: "category.update",
        component: "switch-status"
    },


];
const config = {
    importBtn: false,
    pdfBtn: false,
    excelBtn: false,
    createBtn: true,
    sortable : true
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
    {
        slug: "edit",
        color: "success",
    },
    {
        slug: "delete",
        color: "danger",

    }
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
