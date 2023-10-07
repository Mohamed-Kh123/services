const resource = "service";
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
        text: "name",
        value: "name",
    },
    {
        text: "category_name",
        value: "category_name",
    },
    {
        text: "order_determine_types",
        value: "order_determine_types_name",
    },
    {
        text: "is_active",
        value: "is_active",
        name: "service.update",
        component: "switch-status"
    },


];
const config = {
    importBtn: false,
    pdfBtn: false,
    excelBtn: false,
    createBtn: true,
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
