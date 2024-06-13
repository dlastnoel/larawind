import { defineRule, configure, validate } from 'vee-validate';
import { localize } from '@vee-validate/i18n';
import { required, numeric, length, between,
    min, max, min_value, max_value, confirmed,
    email, image, ext } from '@vee-validate/rules'


defineRule('required_if', (value, [target, data], ctx) => {
    if (ctx.form[target] === data) {

        if(value !== undefined && value !== null && value.length) {

        return true
        }

        return `${ctx.field} is required.`
    }

    return true
})


defineRule('required', required)
defineRule('numeric', numeric)
defineRule('length', length)
defineRule('between', between)
defineRule('min', min)
defineRule('max', max)
defineRule('min_value', min_value)
defineRule('max_value', max_value)
defineRule('confirmed', confirmed)
defineRule('email', email);
defineRule('image', image)
defineRule('ext', ext)


configure({
    generateMessage: localize({
        en: {
            messages: {
            required: '{field} is required.',
            numeric: '{field} must only consist of numbers.',
            length: '{field} must be exactly {length} characters.',
            between: '{field} must be between 0:{min}, 1:{max} characters.',
            min: '{field} must be at least {length} characters.',
            max: '{field} must not exceed {length} characters.',
            min_value: '{field} should not be less than {min}',
            max_value: '{field} should not be greater than {max}.',
            confirmed: '{field} must match {target}.',
            email: '{field} must be a valid email.',
            required_if: '{field} is required.'
            },
        },
    }),
});