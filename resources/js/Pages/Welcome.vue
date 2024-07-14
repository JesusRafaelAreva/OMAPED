<template>
    <Head title="Sistema Web de Gestión para el Área de OMAPED" />

    <section class="buttons">
        <a href="/admin/omapeds/create" @mouseover="handleMouseOver('Añadir Usuario')" @mouseleave="handleMouseLeave">
            <font-awesome-icon :icon="faUserPlus" />
        </a>
        <a href="/admin/omapeds/" @mouseover="handleMouseOver('Editar Usuario')" @mouseleave="handleMouseLeave">
            <font-awesome-icon :icon="faUserEdit" />
        </a>
        <a href="/admin" @mouseover="handleMouseOver('Administrador')" @mouseleave="handleMouseLeave">
            <font-awesome-icon :icon="faLock" />
        </a>
    </section>

    <div v-if="showMessage" class="message">
        {{ showMessage }}
    </div>
</template>

<script setup>
import { ref } from 'vue';
import { Head, Link } from '@inertiajs/vue3';
import { faUserPlus, faUserEdit, faLock } from '@fortawesome/free-solid-svg-icons';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';

const showMessage = ref(null);

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
    roleId: Number,
});

const handleMouseOver = (message) => {
    showMessage.value = message;
};

const handleMouseLeave = () => {
    showMessage.value = null;
};
</script>

<style>
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body {
  background-image: url("https://www.mdbellavista.gob.pe/images/bg.jpg");
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
  background-attachment: fixed;
  margin: 0;
  height: 100vh;
}

.buttons {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  padding: 40px;
  min-width: 500px;
  display: flex;
  justify-content: space-around;
}

.buttons a {
  text-decoration: none;
  color: #fff;
  font-size: 2em;
  background-color: tomato;
  width: 60px;
  height: 60px;
  text-align: center;
  line-height: 60px;
  border-radius: 50%;
  box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.8);
  transition: all 0.3s ease-in-out;
}

.buttons a:nth-child(2) {
  background-color: #b83b5e;
}

.buttons a:nth-child(3) {
  background-color: #222831;
}

.buttons a:nth-child(4) {
  background-color: #ffc300;
}

.buttons a:hover {
  box-shadow: 0 0 30px #cddc39;
  color: #cddc39;
}

.message {
  position: absolute;
  top: 40%;
  left: 50%;
  transform: translate(-50%, -50%);
  background-color: rgba(0, 0, 0, 0.7);
  color: #fff;
  padding: 10px 20px;
  border-radius: 5px;
  font-size: 1.2em;
  z-index: 1000;
}
</style>
