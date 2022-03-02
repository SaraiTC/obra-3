const width = window.innerWidth < 450 ? 450 : window.innerWidth;
const height = window.innerHeight;
const lineHeight = 80;
const commonFont = {
    fontSize: lineHeight,
    lineHeight: lineHeight,
    textColor: 0xffffffff
};

class App extends lng.Application {
    static _template () {
        return {
            TimeWrapper: {
                flex: { direction: "row" },
                mount: .5,
                x: width * 0.5,
                y: height * 0.5,
                Hours: {
                    w: 100,
                    children: [
                        { type: ChangeValue },
                        { type: ChangeValue, x: 50 },
                    ]
                },
                ColonOne: {
                    text: {
                        text: ':',
                        ...commonFont
                    }
                },
                Minutes: {
                    w: 100,
                    children: [
                        { type: ChangeValue  },
                        { type: ChangeValue, x: 50 },
                    ]
                },
                ColonTwo: {
                    text: {
                        text: ':',
                        ...commonFont
                    }
                },
                Seconds: {
                    w: 100,
                    children: [
                        { type: ChangeValue },
                        { type: ChangeValue, x: 50 },
                    ]
                },
                AmPm: {
                    w: 61,
                    x: 10,
                    y: 10,
                    type: ChangeValue,
                    fontSize: 40,
                    lineHeight: 40
                }
            }
        };
    }
    
    setTime (lastTime) {
        const currentDate = new Date();
        currentDate.setSeconds(currentDate.getSeconds() - 1);
 
        if (!lastTime || currentDate.toString() !== lastTime.toString()) { 
            const nextDate = new Date();

            this.setCurrentNext(
                'Hours',
                this.set12Hours(currentDate.getHours()),
                this.set12Hours(nextDate.getHours()),
                false
            );
            this.setCurrentNext(
                'Minutes',
                currentDate.getMinutes(),
                nextDate.getMinutes()
            );
            this.setCurrentNext(
                'Seconds',
                currentDate.getSeconds(),
                nextDate.getSeconds()
            );
            
            this.tag('AmPm').patch({
                currentValue: this.getAmPm(currentDate.getHours()),
                nextValue: this.getAmPm(nextDate.getHours())
            });
        }

        window.requestAnimationFrame(() => this.setTime(currentDate));
    }
    
    getAmPm (hours) {
        let ampm = 'AM';

        if (hours >= 12 && hours < 24) {
            ampm = 'PM';
        }

        return ampm;
    }
    
    set12Hours (hours) {
        return hours % 12 || 12;
    }

    doubleZero (val) {
        return val < 10 ? '0' + val : val.toString();
    }
    
    setCurrentNext (tagName, currentValue = '', nextValue = '', leading = true) {
        const tag = this.tag(tagName);
        currentValue = this.doubleZero(currentValue).split('');
        nextValue = this.doubleZero(nextValue).split('');
        
        if (!leading) {
            currentValue[0] = (currentValue[0] === '0') ? '' : currentValue[0];
            nextValue[0] = (nextValue[0] === '0') ? '' : nextValue[0];
        }

        tag.children = tag.children.map((child, i) => {
            child.patch({
                currentValue: currentValue[i],
                nextValue: nextValue[i]
            });

            return child;
        });
    }

    _init () { this.setTime() }
}

class ChangeValue extends lng.Component {
    _construct () {
        this.duration = .7;
        this.commonFont = commonFont;
    }
    
    _init () {
        this.tag('Group').children.forEach(child => {
            child.patch({
                text: {
                    fontSize: this.fontSize || this.commonFont.fontSize,
                    lineHeight: this.lineHeight || this.commonFont.lineHeight
                }
            });
        });
    }

    static _template (that) {
        return {
            Group: {
                Current: {
                    text: {
                        text: this.bindProp(['currentValue', 'nextValue'], ctx => {
                            const currentValue = ctx.currentValue;
                            const nextValue = ctx.nextValue;

                            if (currentValue !== nextValue) {
                                ctx.changePosition(ctx);
                            }

                            return currentValue;
                        }),
                        ...that.commonFont
                    }
                },
                Next: {
                    y: that.commonFont.lineHeight * -1,
                    alpha: 1,
                    scale: .5,
                    text: {
                        text: this.bindProp(['nextValue']),
                        ...that.commonFont,
                    }
                },
            }
        }
    }
    
    changePosition (ctx) {
        ctx.tag('Group').setSmooth('y', ctx.commonFont.lineHeight, { duration: ctx.duration });
        ctx.tag('Current').setSmooth('alpha', 0, { duration: ctx.duration });
        ctx.tag('Current').setSmooth('scale', .5, { duration: ctx.duration });
        ctx.tag('Next').setSmooth('alpha', 1, { duration: ctx.duration });
        ctx.tag('Next').setSmooth('scale', 1, { duration: ctx.duration });

        ctx.tag('Next').transition('scale').on('finish', () => {
            ctx.resetPosition(ctx);
        });
    }
    
    resetPosition (ctx) {
        ctx.tag('Current').patch({
            text: { text: ctx.nextValue },
            alpha: 1, scale: 1
        });
        ctx.tag('Group').patch({ y: 0 });
        ctx.tag('Next').patch({ alpha: 0, scale: .5 });
    }
}

const StartApp = new App({
    stage: {
        w: adjustDevicePixelRatio(width),
        h: adjustDevicePixelRatio(height),
        precision: adjustDevicePixelRatio(),
        clearColor: "0x00ff0000",
        useImageWorker: false
    },
    debug: true
});

const canvasApp = StartApp.stage.getCanvas();
document.querySelector(".app").appendChild(canvasApp);

function adjustDevicePixelRatio(val = 1) {
    return val * (window.devicePixelRatio || 1);
}