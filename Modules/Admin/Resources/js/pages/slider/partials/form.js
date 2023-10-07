const form = {
    config: {
        resource: "slider",
    },

    inputs: [
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
