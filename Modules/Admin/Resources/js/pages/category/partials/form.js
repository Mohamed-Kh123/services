const form = {
    config: {
        resource: "category",
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
            model: "description",
            label: "description",
            cols: 6,
            rules: {
                required: true
            },
            multiLang: true,
        },
        {
            component: "image",
            model: "image",
            label: "image",
            image_url_option: "image_url",
            cols: 6,
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
