
const form = {
  config: {
        resource: "admins",
  },

    inputs: [
        // {
        //     component: "input",
        //     model: "employee_id",
        //     label: "employee_id",
        //     cols: 6,
        // },

        {
            component: "input",
            model: "name",
            label: "name",
            cols: 6,

            rules: {
              required: true
            },
            multiLang: false,
        },


        {
            component: "input",
            model: "email",
            label: "email",
            type:'email',
            cols: 6,

            rules: {
              required: true
            },
        },
        {
            component: 'select',
            model: 'role',
            label: 'role',
            track_value : "name",
            cols: 6,
            endPoint: { name: 'role.index', params: { no_pagination: true, activated: true } },
            rules: {
                required: true,
            },
            //  filter: (options) => {
            //     console.log('sasssss', this?.form.vehicle_brand_id)
            //     // return _.filter(options, function (option) {
            //     //     return option.vehicle_brand_id === this?.form.vehicle_brand_id;
            //     // });
            // },
        },
        // {
        //     component: "image",
        //     model: "avatar",
        //     label: "image",
        //     image_url_option: "image_url",
        //     cols: 6,
        //     // class: "col-md-6",
        //     // styleAttribute: "width:100px !important ;height : 100px !important"
        // },
        {
            component: "input",
            model: "password",
            label: "password",
            cols: 6,

            rules: {
                required: false
            },
        },
        // {
        //     component: "switch",
        //     model: "is_active",
        //     cols :6,
        //     label: "IS_ACTIVE",
        // },




    ]
};

export default form;
