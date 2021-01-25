<template>
    <div>
        <li class="list-group-item mar-btm">
            <div class="media-left"></div>
            <div class="media-body pad-hor">
                <div class="speech " :class="fontClass">
                    <span class="media-heading">{{ user }}</span>
                    <p><slot></slot></p>
                    <p class="speech-time">
                        <i class="fa fa-clock-o fa-fw"></i>{{ time }}
                    </p>
                </div>
            </div>

            <img
                src="img/user1.png"
                class="img-circle img-sm"
                :class="userImage"
                alt="Profile Picture"
            />
        </li>
    </div>
</template>

<script>
export default {
    props: ["color", "float", "user", "time"],
    computed: {
        getUserImage() {
            return "img/" + this.image;
        },
        // className() {
        //     return 'list-group-item-'+this.color ;
        // },
        fontClass() {
            return "font-" + this.color;
        },
        userImage() {
            return "user-image-" + this.float;
        },
        badgeClass() {
            return "badge-" + this.color;
        }
    },
    mounted() {
        console.log("Component mounted.");
    }
};
</script>
