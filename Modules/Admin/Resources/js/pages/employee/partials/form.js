const form = {
    config: {
        resource: "employee",
    },

    inputs: [
        {
            component: "input",
            model: "name",
            label: "name",
            cols: 6,
            rules: {
                required: true
            },
        },
        {
            component: "input",
            model: "email",
            label: "email",
            cols: 6,
            rules: {
                required: true
            },
        },
        {
            component: "input",
            model: "mobile",
            label: "mobile",
            cols: 6,
            rules: {
                required: true
            },
        },
        {
            component: "input",
            model: "password",
            label: "password",
            cols: 6,
            rules: {
                required: false
            },
        },
        {
            component: "select",
            model: "company_id",
            label: "company_name",
            cols: 6,
            endPoint: {name: 'company.index', params: {no_pagination: true, activated: true}},
            rules: {
                required: false
            },
        },
        {
            component: "select",
            model: "service_id",
            label: "service_name",
            track_value: "name",
            cols: 6,
            multiple: true,
            endPoint: {name: 'service.index', params: {no_pagination: true, activated: true}},
            rules: {
                required: true
            },
        },
        {
            component: "input",
            model: "commission",
            label: "commission",
            cols: 6,
            show: function (){
                return this?.form?.company_id == null
            },
            rules: {
                required: false
            },
        },

        {
            component: "switch",
            model: "is_active",
            cols: 6,
            label: "is_active",
        },


    ]
};

export default form;
