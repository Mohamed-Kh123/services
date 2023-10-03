const form = {
    config: {
        resource: "company",
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
            multiLang: true,
        },
        {
            component: "input",
            model: "commission",
            label: "commission",
            cols: 6,
            rules: {
                required: true
            },
            multiLang: true,
        },
        {
            component: "switch",
            model: "is_active",
            cols: 6,
            label: "is_active",
        },
        {
            component: "switch",
            model: "has_commission",
            cols: 6,
            label: "is_active",
        },


    ]
};

export default form;
