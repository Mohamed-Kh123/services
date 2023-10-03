
const resource = "admins";
const columns = [
    // {
    //     text: "IMAGE",
    //     value: "image_url",
    //     component: "image-holder",
    // },

    {
        text: "id",
        value: "id",
    },
    //
    // {
    //     text: "employee_id",
    //     value: "employee_id",
    // },
    {
        text: "name",
        value: "name",
    },
    {
        text: "email",
        value: "email",
    },
    {
        text: "role",
        value: "role_name",
    },
    {
        text: "is_active",
        value: "is_active",
        name: "admin.update",
        component: "switch-status"
    },

];
const config = {
    importBtn: false,
    // pdfBtn: false,
    // excelBtn: false,
}
const exporting = {
    excel: {
        source: "frontend",
        // endPoint: {'url' : "/api/admin/customer/export/excel", 'method' : 'GET'},
        columns: [

            {
                text: "id",
                value: "id",
            },
            {
                text: "employee_id",
                value: "employee_id",
            },
            {
                text: "name",
                value: "name",
            },
            {
                text: "email",
                value: "email",
            },
        ],
    },
    pdf: {
        source: "frontend",


        // endPoint: {'url' : "/api/admin/customer/export/excel", 'method' : 'GET'},
        columns: [

            {
                text: "id",
                value: "id",
            },
            {
                text: "employee_id",
                value: "employee_id",
            },
            {
                text: "name",
                value: "name",
            },
            {
                text: "email",
                value: "email",
            },

        ],
    },
};
// const importing = {
//     columns: [
//         {
//             text: "full_name",
//             value: "full_name",
//         },
//         {
//             text: "mobile",
//             value: "mobile",
//         },
//         {
//             text: "gender",
//             value: "gender",
//         },
//         {
//             text: "email",
//             value: "email",
//         },
//         {
//             text: "address",
//             value: "address",
//         },
//         {
//             text: "tax_number",
//             value: "tax_number",
//         },
//         // {
//         //     text: "verification_code",
//         //     value: "verification_code",
//         // },
//         // {
//         //     text: "user_agent",
//         //     value: "user_agent",
//         // },
//         {
//             text: "is_fleet",
//             value: "is_fleet",
//         },
//         // {
//         //     text: "is_active",
//         //     value: "is_active",
//         // },
//     ],
// };
const filters = [

    {
        component: "input",
        model: "name_email",
        label: "name_email",
        cols: 4,

    },
    {
        component: "select",
        model: "role",
        label: "role",
        cols: 4,
        endPoint: {name: 'role.index', params: {no_pagination: true}},

    },
];

const actions = [
    {
        slug: "edit",
        color: "success",
        // callback: function (row) {
        //     this.$router.push({name: "country.edit", params: {id: row.id}});
        // }
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
    exporting,
    actions
}
