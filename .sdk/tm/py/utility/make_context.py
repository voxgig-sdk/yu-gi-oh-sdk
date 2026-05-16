# YuGiOh SDK utility: make_context

from core.context import YuGiOhContext


def make_context_util(ctxmap, basectx):
    return YuGiOhContext(ctxmap, basectx)
