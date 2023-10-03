
const form = {
  config: {
        resource: "role",
  },

    inputs: [
        {
            component: "input",
            model: "name",
            label: "name",
            rules: {
                required: true
            },
        },
        {
            component: "permission",
            model: "permissions",
            label: "permissions",
            endPoint: { name: "role.permissions" }
        },


        // {
        //     component: "input",
        //     model: "email",
        //     label: "email",
        //     cols: 6,

        //     rules: {
        //       required: true
        //     },
        // },
        // {
        //     component: "image",
        //     model: "avatar",
        //     label: "image",
        //     image_url_option: "image_url",
        //     cols: 6,
        //     // class: "col-md-6",
        //     // styleAttribute: "width:100px !important ;height : 100px !important"
        // },
        // {
        //     component: "input",
        //     model: "password",
        //     label: "password",
        //     cols: 6,

        //     rules: {
        //         required: true
        //     },
        // },



  ]
};

export default form;
