# Command Pattern
class Command:
    def execute(self): pass

class AddChildCommand(Command):
    def __init__(self, parent, child):
        self.parent = parent
        self.child = child

    def execute(self):
        self.parent.children.append(self.child)
