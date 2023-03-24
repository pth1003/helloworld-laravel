import {Form as VeeForm ,Field as VeeField, defineRule, ErrorMessage, configure} from "vee-validate";

import {required, min, max,
    min_value as minValue,
    max_value as maxValue,
    confirmed,
    not_one_of as excluded,
    alpha_spaces as alphaSpace, email} from "@vee-validate/rules";

export default {
    install(app) {
        app.component('VeeForm', VeeForm)
        app.component('VeeField', VeeField)
        app.component('ErrorMessage', ErrorMessage)

        defineRule('required', required)
        defineRule('min', min)
        defineRule('max', max)
        defineRule('alpha_spaces', alphaSpace)
        defineRule('email', email)
        defineRule('min_value', minValue)
        defineRule('max_value', maxValue)
        defineRule('confirmed', confirmed)
        defineRule('excluded', excluded)

        configure()
    },
}
