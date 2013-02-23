Install Steps
=============

enviroment variables
--------


generate entity classes
--------
This actually doesnt need to be done on deployment, but it needs to be done in Dev when changes are made to the db. (or for small changes you can do it by hand by editing the Entity classes)

Details are listed in doctrineconfig.php, remember it doesnt do all the work somethings need to be done manually.

Add the following line to the top of all entity files "Namespace Entities;"

Run >php index.php orm:generate-proxies

If that command fails open failing class and remove @ID from all fields except the id field

Next, map the associans http://docs.doctrine-project.org/en/2.0.x/reference/association-mapping.html

test by running >php index.php orm:generate-proxies
If you get the error:
  [ReflectionException]

  Class ClerkGroups does not exist

find setter in Clerks.php like so:

    /**
     * Set clerkGroup
     *
     * @param \ClerkGroups $clerkGroup
     * @return Clerks
     */
    public function setClerkGroup(\ClerkGroups $clerkGroup)
    {
        $this->clerkGroup = $clerkGroup;
    
        return $this;
    }

Change to:

    /**
     * Set clerkGroup
     *
     * @param Entities\ClerkGroups $clerkGroup
     * @return Clerks
     */
    public function setClerkGroup(ClerkGroups $clerkGroup)
    {
        $this->clerkGroup = $clerkGroup;
    
        return $this;
    }