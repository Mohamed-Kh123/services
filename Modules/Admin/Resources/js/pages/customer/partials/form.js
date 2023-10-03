const form = {
    config: {
        resource: "customer",
    },

    inputs: [
        {
            component: "input",
            model: "name",
            label: "name",
            cols: 12,
            rules: {
                required: true
            },
            multiLang: false,
        },
        {
            component: "switch",
            model: "has_commission",
            cols: 6,
            label: "has_commission",
        },
        {
            component: "switch",
            model: "is_active",
            cols: 6,
            label: "is_active",
        },
        {
            component: "input",
            model: "commission",
            label: "commission",
            cols: 6,
            show: function () {
                return this?.form?.has_commission === 1;
            },
            rules: {
                required: false
            },
            multiLang: false,
        },

    ]
};

export default form;
