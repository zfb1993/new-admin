<template>
    <div class="top">
        <div class="left"></div>
        <div class="right">
            <h1 style="margin-left: 50px;">{{$route.name}}</h1>
        </div>
    </div>
</template>

<script>
export default {
    name:'TopBar'
}
</script>

<style lang="scss" scoped>
    .top{
        height: 70px;
        width: 100%;
        display: flex;
        .left{
            background-color: #363e4f;
            width: 240px;
            height: 100%;
        }
        .right{
            height: 100%;
            width: calc(100% - 240px);
            border-bottom: 1px solid #e6e6e6;
            display: flex;
            align-items: center;
        }
    }
</style>
