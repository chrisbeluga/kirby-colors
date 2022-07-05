<template>

    <k-field
        class="k-colors-field"
        v-bind:help="help"
        v-bind:label="label"
        v-bind:disabled="disabled"
        v-bind:required="required">
        <div
            class="k-colors-field">
            <div
                class="k-colors-container">
                <button
                    type="button"
                    class="k-colors-item"
                    v-for="(option, index) in options"
                    v-on:click.prevent="action_click(option)"
                    v-bind:key="option.hex">
                    <div
                        class="k-colors-block"
                        v-bind:style="{
                            'background-color' : '#' + option.hex
                        }">
                        <svg
                            viewBox="0 0 448 512"
                            class="k-colors-icon"
                            v-if="(option.hex === value.hex)"
                            v-bind:class="action_color(option.hex) ? 'dark' : 'light'"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M438.6 105.4C451.1 117.9 451.1 138.1 438.6 150.6L182.6 406.6C170.1 419.1 149.9 419.1 137.4 406.6L9.372 278.6C-3.124 266.1-3.124 245.9 9.372 233.4C21.87 220.9 42.13 220.9 54.63 233.4L159.1 338.7L393.4 105.4C405.9 92.88 426.1 92.88 438.6 105.4H438.6z" />
                        </svg>
                    </div>
                </button>
            </div>
        </div>
    </k-field>

</template>

<script>

    export default {
        name: 'k-colors-field',
        props: {
            help: {
                type: String,
                required: false
            },
            value: {
                type: Object,
                required: false,
                default: () => ({
                    hex: '',
                    class: '',
                    title: ''
                })
            },
            label: {
                type: String,
                required: false
            },
            disabled: {
                type: Boolean,
                required: false
            },
            required: {
                type: Boolean,
                required: false
            },
            options: {
                type: Object,
                required: true
            },
        },
        methods: {
            action_click(data) {
                this.$emit('input', {
                    ...data
                })
            },
            action_color(data) {
                const hex = data.replace('#', '')
                const c_r = parseInt(hex.substr(0, 2), 16)
                const c_g = parseInt(hex.substr(2, 2), 16)
                const c_b = parseInt(hex.substr(4, 2), 16)
                const brightness = ((c_r * 299) + (c_g * 587) + (c_b * 114)) / 1000
                return brightness > 155
            }
        }
    }

</script>

<style lang="scss" scoped>

    .k-colors-field {
        display: flex;
        flex-direction: column;
        .k-colors-container {
            background: var(--color-white);
            padding: var(--spacing-5);
            gap: .875rem;
            display: flex;
            flex-wrap: wrap;
            box-shadow: var(--shadow);
            border-radius: var(--rounded);
            .k-colors-block {
                width: 2.5rem;
                height: 2.5rem;
                display: flex;
                align-items: center;
                justify-content: center;
                border: var(--field-input-border);
                border-radius: var(--rounded);
                .k-colors-icon {
                    width: 1.25rem;
                    height: 1.25rem;
                    &.dark {
                        fill: var(--color-black)
                    }
                    &.light {
                        fill: var(--color-white)
                    }
                }
            }
        }
    }

</style>
