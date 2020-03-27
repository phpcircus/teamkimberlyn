import Hub from 'Events/hub';

export default {
    install (Vue, options) {
        Vue.prototype.$showDialog = (level, amount, callback) => {
            Vue.prototype.$modal.show('dialogModal', {
                title: level === 'warning' ? 'Caution!' : 'Notice',
                text: `Your total is $${amount}, proceed?`,
                buttons: [
                    {
                        title: 'Proceed',
                        type: 'create',
                        handler: callback,
                    },
                    {
                        title: 'Close',
                        type: 'close',
                        handler: () => {
                            Vue.prototype.$modal.hide('dialogModal');
                            Hub.$dispatch('purchaseFormReady');
                        },
                    },
                ],
            });
        };

        Vue.prototype.$showConfirm = (level, subject, verb, callback) => {
            Vue.prototype.$modal.show('confirmModal', {
                title: level === 'warning' ? 'Caution!' : 'Info',
                text: `Are you sure you want to ${verb} this ${subject}?`,
                buttons: [
                    {
                        title: verb.charAt(0).toUpperCase() + verb.slice(1) + ' ' + subject.charAt(0).toUpperCase() + subject.slice(1),
                        type: verb,
                        handler: callback,
                    },
                    {
                        title: 'Close',
                        type: 'close',
                        handler: () => Vue.prototype.$modal.hide('confirmModal'),
                    },
                ],
            });
        };

        Vue.prototype.$hideDialog = () => Vue.prototype.$modal.hide('dialogModal');
        Vue.prototype.$hideConfirm = () => Vue.prototype.$modal.hide('confirmModal');
    },
}
