"use strict";
Object.defineProperty(exports, "__esModule", { value: true });
exports.YuGiOhError = void 0;
class YuGiOhError extends Error {
    isYuGiOhError = true;
    sdk = 'YuGiOh';
    code;
    ctx;
    status = -1;
    // `err.notFound` rather than a magic number at every call site.
    get notFound() { return 404 === this.status; }
    constructor(code, msg, ctx) {
        super(msg);
        this.code = code;
        this.ctx = ctx;
    }
}
exports.YuGiOhError = YuGiOhError;
//# sourceMappingURL=YuGiOhError.js.map