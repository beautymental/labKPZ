# Visitor Pattern
class Visitor:
    def visit(self, element): pass

class TagCollector(Visitor):
    def __init__(self):
        self.tags = []

    def visit(self, element):
        self.tags.append(element.tag)
        for child in element.children:
            self.visit(child)
