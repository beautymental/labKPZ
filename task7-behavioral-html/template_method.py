# Template Method Pattern
class LifecycleHook:
    def on_created(self): pass
    def on_inserted(self): pass

    def lifecycle(self):
        self.on_created()
        self.on_inserted()
