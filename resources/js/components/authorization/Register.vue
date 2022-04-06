<template>
    <div class="register">
        <h1>{{ 'ანგარიშის შექმნა'}}</h1>
        <div class="register-form">
            <div class="input-form">
                <div>
                    <p>{{ 'სახელი'}}: *</p>
                    <input v-model="registrationData.name" type="text" name="name"
                           :placeholder="'თქვენი სახელი'">
                </div>

                <div>
                    <p>{{ 'ელ. ფოსტა' }}: *</p>
                    <input v-model="registrationData.email" type="text" name="email"
                           :placeholder="'თქვენი ელექტრონული ფოსტა'">
                </div>


                <div>
                    <p>{{ 'პაროლი' }}: *</p>
                    <input v-model="registrationData.password" type="password" name="password"
                           :placeholder="'თქვენი პაროლი'">
                </div>
                <div>
                    <p>{{ 'გაიმეორე პაროლი' }}: *</p>
                    <input v-model="registrationData.password_confirmation" type="password" name="password"
                           :placeholder="'თქვენი პაროლი'">
                </div>
            </div>
            <div class="terms-of-service">

            <div class="submit" @click="register">
                <span>{{ 'ანგარიშის შექმნა' }}</span>
            </div>

            </div>
        </div>
    </div>

</template>

<script>
export default {
    name: 'register',
    data() {
        return {
            registrationData: {
                name: null,
                email: null,
                password: null,
                password_confirmation: null,
            }
        }
    },
    methods: {
        register() {
            this.$store.dispatch('login/register', this.registrationData).then(() => {
                this.$router.push('/');
            })
        }
    }
}
</script>

<style scoped lang="scss">
.register {

    h1 {
        font-weight: 500;
        font-size: 48px;
        line-height: 60px;
        color: #000000;
        text-align: center;
        margin: 60px 0 120px;
    }

    .register-form {
        max-width: 850px;
        background: #FFFFFF;
        box-shadow: 0 22px 70px #C9E6ED;
        border-radius: 30px;
        padding: 75px 80px;
        margin: 0 auto 100px;

        .input-form {
            display: grid;
            grid-template-columns: 1fr 1fr;
            grid-template-rows: 80px 80px 80px 80px 80px 80px;
            grid-gap: 30px;

            p {
                font-weight: 500;
                font-size: 16px;
                color: #000000;
                margin: 0 0 12px 24px;
            }

            input, select {
                height: 50px;
                width: 100%;
                background: #FAFDFE;
                border: 1px solid #D1EAF1;
                box-sizing: border-box;
                box-shadow: 0 2px 1px rgba(209, 234, 241, 0.25);
                border-radius: 40px;
                padding: 2px 18px;
                font-weight: 500;
                font-size: 16px;
                color: #889CB9;
                margin: 0 0 20px;
            }

            input:focus, select:focus, input:focus-visible, select:focus-visible {
                border-color: #1D519A;
                outline: none;
            }

            input::placeholder {
                color: #889CB9;
                font-size: 16px;
            }
        }

        .terms-of-service {
            padding: 30px 0;
            display: flex;
            align-items: center;

            input {
                height: 30px;
                width: 30px;
                //background: #00D1FF;
                margin: 0 18px 0 0;
            }

            p {
                font-weight: 500;
                font-size: 14px;
                color: #000000;

                a {
                    color: #00D1FF;
                    text-decoration: underline;
                }
            }
        }

        .submit {
            border: 1px solid #1D519A;
            box-sizing: border-box;
            border-radius: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 50px;
            width: 100%;
            cursor: pointer;

            span {
                font-weight: bold;
                font-size: 16px;
                color: #1D519A;
            }
        }
    }
}
</style>
