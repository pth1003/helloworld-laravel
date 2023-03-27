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
        defineRule('password_mismatch', confirmed)
        defineRule('excluded', excluded)

        configure({
            generateMessage: (ctx) => {
                const messages = {
                    required: `The field ${ctx.field} is required`,
                    min: `The field ${ctx.field} is too short`,
                    max: `The field ${ctx.field} is too long`,
                    email: `The field ${ctx.field} must be a valid emial`,
                    min_value: `The field ${ctx.field} is to low`,
                    max_value: `The field ${ctx.field} is to high`,
                    password_mismatch: "The password don't match."
                };
                const message = messages[ctx.rule.name] ? messages[ctx.rule.name] : `The field ${context.field} in valid`
                return message
            }

        })
    },
}
