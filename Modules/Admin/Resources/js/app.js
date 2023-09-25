import App from "nawadash";
import routes from "./routes";
import i18n from "./i18n";
import config from "./config";
import endPoints from "./endPoints";
import common from "nawadash/src/mixins/common.js";
import ButtonField from "./components/Button.vue";

const app = new App({
    base: "admin",
    routes,
    config,
    i18n,
    common,
    endPoints,
    components : {
        ButtonField
    }
}).init();

export default app;
