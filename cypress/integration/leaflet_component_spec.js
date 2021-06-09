describe('Leaflet component', () => {
    it('Basic one loads without console errors', () => {
        cy.visit('/maps/leaflet', {
            onBeforeLoad(win) {
                cy.stub(win.console, 'log').as('consoleLog')
                cy.stub(win.console, 'error').as('consoleError')
            }
        })
        cy.wait(2000)
        cy.get('@consoleLog').should('not.be.called')
        cy.get('@consoleError').should('not.be.called')
    })
})
