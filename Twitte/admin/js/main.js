let $clock = null;
const ONE_SECOND = 1000;

class Clock {
    constructor() {
        this.limitTime = null;
        this.currentTime = 0;
        this.$clock = document.querySelector('p');
        this.clock = null;
    }
    render (string) {
        this.$clock.textContent = string;
    }

    start(formattedTime) {
        this.limitTime = Clock.parseSeconds(formattedTime);
        this.upDate();
        this.clock = setInterval(() => {
            this.currentTime += ONE_SECOND;
            this.upDate();
            

            if (this.isFinished()) {
                this.stop();
            }
        }, ONE_SECOND);
    }

    upDate() {
        let remain = this.getRemainingTime();
        let time = Clock.formattedTime(remain);
        this.render(time);
    }

    getRemainingTime() {
        return this.limitTime - this.currentTime;
    }

    stop() {
        window.location.reload(true);
    }

    isFinished() {
        return this.currentTime === this.limitTime;
    }

    static parseSeconds(time) {
        let [minutes, seconds] = time.split(':').map(Number);
        return minutes * 60 * ONE_SECOND + seconds * ONE_SECOND;
    }

    static formattedTime(milliseconds) {
        let minutes = Math.floor(milliseconds / ONE_SECOND / 60);
        let seconds = milliseconds / ONE_SECOND % 60;
        minutes = String(minutes).padStart(2, '0');
        seconds = String(seconds).padStart(2, '0');
        return `${minutes}:${seconds}`;
    }
}

function setup() {
    let clock1 = new Clock();
    clock1.start('60:00');
}
window.addEventListener('DOMContentLoaded', setup);