# State Pattern
class State:
    def handle(self): pass

class EditingState(State):
    def handle(self): return 'Editing...'

class ViewingState(State):
    def handle(self): return 'Viewing...'
