import { Notyf } from 'notyf';

export default function(type = 'info', message = null) {

    let messageContent = message

    if(!messageContent) {

      switch (type) {

        case 'info':
          messageContent = 'Success!'
          break
        
        case 'error':
          messageContent = 'Error.'
          break
      }
    }
    
    const notyf = new Notyf({
        duration: 3000,
        position: {
          x: 'right',
          y: 'bottom',
        },
        types: [
          {
            type: 'error',
            background: '#E57373',
            dismissible: false,
          },
          {
            type: 'info',
            background: '#0ea5e9',
            icon: {
              className: 'notyf__icon--info'
            },
            dismissible: false,
          }
        ]
      })

    notyf.open({
      type: type,
      message: messageContent
    })
}