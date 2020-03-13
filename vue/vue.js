Vue.component("vue-button", {
  props: {
    text: {
      type: String,
      default: ""
    }
  },

  methods: {
    addTextToComponent: function() {
      this.addedText = "you have clicked the button " + this.text;
    }
  },

  data() {
    return {
      addedText: ""
    };
  },

  template: `
    <span>
        <button v-on:click="addTextToComponent">{{ text }}</button>
        {{ addedText }}
    </span>
    `
});

new Vue({
  el: "#container",
  data: {
    heading: "A Vue heading it is",
    clickCount: 0
  },
  methods: {
    addCount: function() {
      this.clickCount++;
    },
    reduceCount: function() {
      this.clickCount--;
    }
  }
});
