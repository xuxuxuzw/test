<template>
   <img :src="qrcode_url" alt="">
</template>

<script>
    export default {
        name: "web",
        data(){
            return {
                msg:'',
                code:'',
                qrcode_url:'',
            }
        },
        methods:{
            setIntervalRequest(s){
                setInterval(()=>{
                    axios.post(Laravel.router('api.home.wechat.api.web_login',{code:this.code})).then(res=>{
                        if(res.data.errorCode){
                            this.msg = res.data.msg
                            this.code = res.data.code
                            this.qrcode_url = res.data.qrcode_url
                        }else{
                            this.msg = res.data.msg
                            setTimeout(()=>{
                                location.href = res.data.redirect
                            },2000)
                        }
                    })
                },1000*s)
            },

        },
        created(){
            axios.post(Laravel.router('api.home.wechat.api.web_login')).then(res=>{
                if(res.data.errorCode){
                    this.msg = res.data.msg
                    this.code = res.data.code
                    this.qrcode_url = res.data.qrcode_url
                    this.setIntervalRequest(3)
                }
            })
        }
    }
</script>

<style scoped>

</style>
