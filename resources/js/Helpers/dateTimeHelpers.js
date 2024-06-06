import moment from "moment";

export function greet() {

    const currentHour = moment().format('HH')

    if(currentHour === 24 || currentHour >= 1 && currentHour <= 11) {
        return 'Good morning'
    }

    if(currentHour >= 12 && currentHour <= 17) {
        return 'Good afternoon'
    }


    if(currentHour >= 18 && currentHour <= 23) {
        return 'Good evening'
    }
}