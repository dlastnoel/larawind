import Swal from 'sweetalert2'

export default function(type = info, message) {

    Swal.fire({
        title: message,
        toast: true,
        icon: type,
        animation: true,
        position: 'bottom-end',
        showCancelButton: false,
        showConfirmButton: false,
        showDenyButton: false,
        timer: 3500,
        iconColor: 'white',
        customClass: {
            popup: 'colored-toast',
        },
    })
}