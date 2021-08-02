new Vue({
    el: '#pop-up.feedback',
    data() {
        return {
            email: '',
            isShow: false,
            status: 'Отправить',
            state: 0,
        }
    },
    methods: {
        sendForm() {
            if(this.validateForm()) {
                console.info('Отправка..', this.email)

                this.status = 'Отправка..'
                const body = `Новая заявка<br>Email: ${this.email}<br>`

                Email.send({
                    Host: "smtp.mail.ru",
                    Username: "kabakov20@inbox.ru",
                    Password: "glina2020",
                    To: 'kabakov20@inbox.ru',
                    From: "kabakov20@inbox.ru",
                    Subject: "Новая заявка",
                    Body: body,
                })
                .then(() => {
                    this.state = 1
                    this.status = 'Успешно!'
                    console.log('Успешно!')

                    setTimeout(() => {
                        this.isShow = false
                    }, 1500)
                })
                .catch(() =>  {
                    this.state = -1
                    this.status = 'Ошибка..'
                    console.error('Ошибка отправки!')

                    setTimeout(() => {
                        this.isShow = false
                    }, 3000)
                });
            }
        },
        validateForm() {
            if(this.email && this.email != "")
                return true
            return false
        }
    }
})