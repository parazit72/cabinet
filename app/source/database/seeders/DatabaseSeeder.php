<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $date = date('Y-m-d H:i:s', strtotime('2023-12-27T21:01:47.000000Z'));


        DB::table('users')->insert([
            'id'        => '1',
            'user_id'   => '1',
            'name'      => 'admin',
            'type'      => 'admin',
            'email'     => 'javadabbasi72@gmail.com',
            'password'  => bcrypt('Pass123!'),
            'remember_token' => 'enb',
        ]);

        DB::table('users')->insert([
            'id'        => '2',
            'user_id'   => '1',
            'name'      => 'tester',
            'type'      => 'admin',
            'email'     => 'm.aghajani1211@gmail.com',
            'password'  => bcrypt('Pass123!'),
            'remember_token' => 'enb',
        ]);




        DB::table('menus')->insert([
            'title'       => 'Home',
            'target'       => '_self',
            'url'        => '/',
            'order'       => '14',
            'status'      => 'Enable',
            'position'      => 'header',

            'created_at'  => $date,
        ]);


        DB::table('menus')->insert([
            'title'       => 'Solutions',
            'target'       => '_self',
            'url'        => '/solutions',
            'order'       => '13',
            'status'      => 'Enable',
            'position'      => 'header',

            'created_at'  => $date,
        ]);

        DB::table('menus')->insert([
            'title'       => 'Resources',
            'target'       => '_self',
            'url'        => '/resources',
            'order'       => '12',
            'status'      => 'Enable',
            'position'      => 'header',
            'created_at'  => $date,
        ]);

        DB::table('menus')->insert([
            'title'       => 'About us',
            'target'       => '_self',
            'url'        => '/about-us',
            'order'       => '11',
            'status'      => 'Enable',
            'position'      => 'header',
            'created_at'  => $date,
        ]);

        DB::table('menus')->insert([
            'title'       => 'Home',
            'target'       => '_self',
            'url'        => '/',
            'order'       => '34',
            'status'      => 'Enable',
            'position'      => 'col_b',

            'created_at'  => $date,
        ]);


        DB::table('menus')->insert([
            'title'       => 'Solutions',
            'target'       => '_self',
            'url'        => '/solutions',
            'order'       => '33',
            'status'      => 'Enable',
            'position'      => 'col_b',

            'created_at'  => $date,
        ]);

        DB::table('menus')->insert([
            'title'       => 'Blog',
            'target'       => '_self',
            'url'        => '/resources',
            'order'       => '32',
            'status'      => 'Enable',
            'position'      => 'col_b',

            'created_at'  => $date,
        ]);

        DB::table('menus')->insert([
            'title'       => 'About us',
            'target'       => '_self',
            'url'        => '/about-us',
            'order'       => '31',
            'status'      => 'Enable',
            'position'      => 'col_b',

            'created_at'  => $date,
        ]);


        DB::table('menus')->insert([
            'title'       => 'LinkedIn',
            'target'       => '_blank',
            'url'        => 'https://linkedin.com',
            'order'       => '22',
            'status'      => 'Disable',
            'position'      => 'col_a',
            'icon' => "/assets/images/in.svg",
            'created_at'  => $date,
        ]);

        DB::table('menus')->insert([
            'title'       => 'Info@Scalegtm.com',
            'target'       => '_self',
            'url'        => 'mailto:info@scalegtm.com',
            'order'       => '21',
            'status'      => 'Enable',
            'position'      => 'col_a',
            'icon' => "/assets/images/email.svg",
            'created_at'  => $date,
        ]);

        DB::table('sliders')->insert([
            'id'        => '1',
            'title'        => 'In a revenue funk?',
            'description'        => '<p>20% of your team is contributing 80% of the revenue</p> <p>Growth has stalled with no end in sight</p>            <p>Losing to the “no decision, decision”</p>',
            'cta_text'        => 'Break Out of The Funk',
            'cta_link'        => '#get-in-touch',
            'cta_color'        => 'rgba(255, 255, 255, 1)',
            'cta_bg'        => 'rgba(255,92,92, 1)',
            'order'  => '2',
            'background' => json_encode(['mpeg' => "/assets/videos/01.mp4", 'webm' => "/assets/videos/01.webm", 'image' => "/assets/videos/01.jpg"]),
            'status'  => 'Published',
            'created_at' => $date,
        ]);

        DB::table('page_settings')->insert([
            'id'        => '1',
            'meta_title'        => 'Unique Star Cabinetry - Home',
            'meta_description'        => 'home description',
            'meta_keywords'        => 'home',
        ]);

        DB::table('page_settings')->insert([
            'id'        => '2',
            'meta_title'        => 'Unique Star Cabinetry - Solutions',
            'meta_description'        => 'Solutions description',
            'meta_keywords'        => 'service',
        ]);
        DB::table('page_settings')->insert([
            'id'        => '3',
            'meta_title'        => 'Unique Star Cabinetry - Blog',
            'meta_description'        => 'Unique Star Cabinetry - Blog',
            'meta_keywords'        => 'blog',
        ]);

        DB::table('about_settings')->insert([
            'id'        => '1',
            'title'        => 'What you can expect from us',
            'description'        => 'These guiding principles are a core part of every engagement',
            'meta_title'        => 'Unique Star Cabinetry - About',
            'meta_description'        => 'What you can expect from us',
            'meta_keywords'        => 'about',
            'events' => json_encode(
                [
                    [
                        'title' => "Keep it simple",
                        'description' => "Your challenges are complex, but the solution shouldn’t be  Focus on simplicity - easy to understand, easy to apply Start with understanding your business, challenges, and people",
                        'color' => "rgba(255, 92, 92, 1)"
                    ],
                    [
                        'title' => "No adoption, no value",
                        'description' => "Don’t fall into the YAT trap (YAT = yet another tool/training) Key stakeholders are included in crafting the solution Mutually created success plans drive accountability",
                        'color' => "rgba(128, 212, 255, 1)"
                    ],
                    [
                        'title' => "Time is of the essence",
                        'description' => "Deploy within a quarter (90% programs start and deploy in <3 months) Break down the challenge into core components Prioritize and focus",
                        'color' => "rgba(255, 217, 136, 1)"
                    ]
                ]
            ),
            'stories' => json_encode(
                [
                    [
                        'title' => "Our story",
                        'description' => "Prior to founding Unique Star Cabinetry, John honed his craft with over 2 decades of hands-on experience leading transformational go-to-market initiatives. These initiatives resulted in successes ranging from the rapid growth of a high-tech company from $25M to $1B and opening a new multi-billion dollar mobile channel for the 5th largest bank in the world. Through all these experiences, John started to see a recurring pattern of pitfalls faced by go-to-market teams during these critical growth phases.",
                        'image' => "/static/2024/03/s1.jpg"
                    ],
                    [
                        'title' => "Proactive approach to success",
                        'description' => "In 2020, Unique Star Cabinetry was born from a simple yet powerful idea: Why wait for the pitfalls of growth to surface? John envisioned a proactive approach, leveraging pattern matching and industry best practices to anticipate these challenges before they arise.",
                        'image' => "/static/2024/03/s2.jpg"
                    ],
                    [
                        'title' => "Best practices from the industry",
                        'description' => "At Unique Star Cabinetry, we don’t believe in reinventing the wheel. Instead, we capitalize on lessons learned and best practices as a strategic starting point that is then tailored to fit your organization's unique needs. Let's transcend the traditional growth journey - proactively plan for success with Unique Star Cabinetry.",
                        'image' => "/static/2024/03/s3.jpg"
                    ]
                ]
            ),

        ]);

        DB::table('sliders')->insert([
            'id'        => '2',
            'title'        => 'Congratulations',
            'description'        => '<p style="color: #49C7F0">            You’re ready to grow. What now?       </p>  <p>            Deploy best-in-class sales and qualification methodologies        </p>        <p>Scale success from the select few to the broader team</p>        <p>            Deliver sales messaging and pitch that compels buyers with            budget and influence to act        </p>                        ',
            'cta_text'        => 'Ready, Set, Grow!',
            'cta_link'        => '#get-in-touch',
            'cta_color'        => 'rgba(255, 255, 255, 1)',
            'cta_bg'        => 'rgba(73, 199, 240, 1)',
            'background' => json_encode(['mpeg' => "/assets/videos/02.mp4", 'webm' => "/assets/videos/02.webm", 'image' => "/assets/videos/02.jpg"]),
            'order'  => '1',
            'status'  => 'Published',
            'created_at' => $date,
        ]);




        DB::table('reviews')->insert([
            'id'          => '1',
            'name'        => 'Hasan Imam',
            'profile'     => '/static/2024/03/r1.png',
            'role'        => 'CEO',
            'company'        => 'Obsidian Security',
            'body'        => "<table>
            <tbody>
            <td>
            <h4>What led you to work with Unique Star Cabinetry?</h4>
            The very thing that organizations have come to depend on, is also their greatest security vulnerability. It’s our mission to help CSOs understand why protecting SaaS applications needs to be at the top of their priority list. It shouldn’t surprise anyone, but CSOs are overwhelmed with securing their organizations due to the ever evolving landscape of cyberattacks. We needed a way to capture, and keep their attention.
            </td>
            <td>
            <h4>How did the engagement go?</h4>
            Unique Star Cabinetry not only drove the creation of this pivotal messaging, but they also trained and certified my entire sales organization. Emboldened with this message, our sellers have been able to not only effectively engage with CSOs, but they have also consistently secured budget in the toughest software sales environment we’ve faced in over a decade. Unique Star Cabinetry was a foundational partner to our growth journey, and I have turned to them time and time again to deliver the marketing and sales initiatives to achieve our mission.
            </td>
            </tr>
            </tbody>
            </table>",
            'status'  => 'Published',
            'created_at' => $date,
            'order' => 10,
        ]);

        DB::table('reviews')->insert([
            'id'          => '2',
            'name'        => 'Jeff Santelices',
            'profile'     => '/static/2024/03/r2.png',
            'role'        => 'Chief Revenue Officer',
            'company'        => 'Responsive',
            'body'        => "<table>
            <tbody>
            <td>
            <h4>What led you to work with Unique Star Cabinetry?</h4>
            Upon joining Responsive as their first CRO, I found Unique Star Cabinetry to be an already trusted partner for the marketing teams. What became immediately apparent was their breadth of knowledge spanning across marketing and sales. They quickly established themselves as an invaluable advisor to me as I ramped on the business.
            </td>
            <td>
            <h4>How did the engagement go?</h4>
            Our collaboration kicked off with the roll out of MEDDPICC. This rollout was the fastest, most methodical, and well received I have ever witnessed. It encompassed leaders, CRM operationalization, and hands-on support for frontline managers and their teams! I even received unsolicited feedback from sales managers about the exceptional value John personally brought to their team interactions. Unique Star Cabinetry has evolved into the strategic partner I consistently rely on, quarter after quarter, to empower our sales leaders and sellers with the essential messaging, skills, and tools crucial for accelerating our growth journey!
            </td>
            </tr>
            </tbody>
            </table>",
            'status'  => 'Published',
            'created_at' => $date,
            'order' => 9,
        ]);


        DB::table('reviews')->insert([
            'id'          => '3',
            'name'        => 'David Weiner',
            'profile'     => '/static/2024/03/r3.png',
            'role'        => 'Chief Revenue Officer',
            'company'        => 'Tekmetric',
            'body'        => "<table>
            <tbody>
            <td>
            <h4>What led you to work with Unique Star Cabinetry?</h4>
            I have the privilege of steering an incredibly talented, but diverse set of leaders across sales, marketing, partnerships, and operations. After settling into the role, I came to realize that if we were going to achieve our mission, this collection of individual leaders needed to act as a single cohesive team. We needed to adopt the characteristics of high performing leadership teams, such as trust, candid debate, and unwavering commitment to our decisions. Just as importantly, time was of the essence because we have a unique opportunity to help shape the future of the auto repair industry. Unique Star Cabinetry successfully partnered with me in my previous company to accelerate the adoption of these characteristics across the leadership team.
            </td>
            <td>
            <h4>How did the engagement go?</h4>
            Using the same methodical approach, Unique Star Cabinetry took the time to understand our business. Through 1:1 interviews with each leader, John personally crafted leadership portraits of every person’s background, strengths, and opportunities. This preparation culminated in a tailored in-person workshop masterfully facilitated by John. Coming out of the workshop, I have already started to observe how leaders are applying what they've learned. It was not easy to get my leadership team to step away from their day to day, but an absolute necessity for us if we are to reach the most ambitious goals in the company’s history in the upcoming year.
            </td>
            </tr>
            </tbody>
            </table>",
            'status'  => 'Published',
            'created_at' => $date,
            'order' => 8,
        ]);



        DB::table('reviews')->insert([
            'id'          => '4',
            'name'        => 'Paul Turner',
            'profile'     => '/static/2024/03/r4.png',
            'role'        => 'Former SVP Worldwide Sales',
            'company'        => 'Hackerone',
            'body'        => "<table>
            <tbody>
            <td>
            <h4>What led you to work with Unique Star Cabinetry?</h4>
            As my responsibility expanded from EMEA to include all revenue teams globally, I was faced with the challenge of growing the business across every region and segment. I identiﬁed investment in our sales leaders as a critical lever to drive performance around the world.
            </td>
            <td>
            <h4>How did the engagement go?</h4>
            Unique Star Cabinetry dove in to understand the challenges faced by my leaders, and tailored a comprehensive program that showed them how to maximize productivity of their quota carrying reps. The cornerstone of the program was a rep coaching program, completely tailored to our needs, that was personally rolled out by John and our enablement team in a live in-person workshop. I anticipated the newly promoted sales managers would receive incredible value from this. But what I was most surprised by was how valuable this was for even our most seasoned enterprise leaders. This investment, amidst the quarterly pressure of revenue goals, proved foundational for maximizing the potential and ROI of our sales leadership team.
            </td>
            </tr>
            </tbody>
            </table>",
            'status'  => 'Published',
            'created_at' => $date,
            'order' => 7,
        ]);

        DB::table('reviews')->insert([
            'id'          => '5',
            'name'        => 'Brian McDowell',
            'profile'     => '/static/2024/03/r5.png',
            'role'        => 'Former CRO',
            'company'        => 'Firstup.io',
            'body'        => "<table>
            <tbody>
            <td>
            <h4>What led you to work with Unique Star Cabinetry?</h4>
            Leading the revenue organization in the midst of the pandemic was already challenging enough, but we also added the transition of our solution and brand from a pure communications play to an employee experience platform. These changes had a dramatic impact on how we message our value, who our buyer is, how we prospect, and so much more. We needed a partner that possessed both the breadth of knowledge, and depth of capabilities to drive this transformation across our revenue team
            </td>
            <td>
            <h4>How did the engagement go?</h4>
            Unique Star Cabinetry leaped into action. They took the time to lean in and partner with every function across my sales organization, from lead development to account executives. They delivered on a wide range of programs including selling to the new IT persona (due to our transition to a platform), upgrading outbound campaigns and sequences, instituting a CFO credible value program, and programmatically establishing a set of onboarding and ongoing enablement targeted at the lead development team. John’s personal involvement and commitment to our success led to a successful long-term relationship where I came to view Unique Star Cabinetry as a trusted advisor.
            </td>
            </tr>
            </tbody>
            </table>",
            'status'  => 'Published',
            'created_at' => $date,
            'order' => 6,
        ]);
        DB::table('reviews')->insert([
            'id'          => '6',
            'name'        => 'Eve Alexander',
            'profile'     => '/static/2024/03/r6.png',
            'role'        => 'VP of Product Marketing',
            'company'        => 'Seismic',
            'body'        => "<table>
            <tbody>
            <td>
            <h4>What led you to work with Unique Star Cabinetry?</h4>
            As the head of product marketing for the world’s leading enablement platform, it’s critical to connect the dots between our solution and the needs of our customers. The challenge is to do this at scale and still have it resonate with individual organizations and buyers. We had an opportunity to do just that through the release of Seismic Professional Edition, designed specifically to help small and medium sized businesses get started quickly and easily.
            </td>
            <td>
            <h4>How did the engagement go?</h4>
            Unique Star Cabinetry was central to crafting the messaging for our new edition and related services. They developed internal enablement deliverables and playbooks to help sellers embrace and integrate Professional Edition into their sales pursuits. With the successful rollout, we’ve been able to open up new opportunities, accelerate sales cycles, and simplify the buying process for a key segment.
            </td>
            </tr>
            </tbody>
            </table>",
            'status'  => 'Published',
            'created_at' => $date,
            'order' => 5,
        ]);

        DB::table('reviews')->insert([
            'id'          => '7',
            'name'        => 'Konnor Martin',
            'profile'     => '/static/2024/03/r7.png',
            'role'        => 'VP of Sales',
            'company'        => 'Responsive',
            'body'        => "<table>
            <tbody>
            <td>
            <h4>What led you to work with Unique Star Cabinetry?</h4>
            When you can take credit for some of the earliest sales as an individual contributor, as well as growing out the North America sales organization, it means you’ve seen a lot! It seems like every year there is a new hurdle to clear. This past year was no exception. As customer validation of our value reached a tipping point, we decided to step on the gas pedal. Our key focus became boosting rep productivity, and Unique Star Cabinetry was our trusted partner throughout.
            </td>
            <td>
            <h4>How did the engagement go?</h4>
            They started by delivering a new message that deeply resonated with our buyers. Then they moved to help us standardize on MEDDPICC. Next, they engaged in team based training as well as 1:1 coaching and deal reviews. John has personally been there at every turn, good and bad, as a thought partner, as well as someone who has rolled up his sleeves. In line with our company name and brand, Unique Star Cabinetry’s responsiveness, insights, and executional excellence was foundational in helping us achieve the highest sales performance in the company’s history.
            </td>
            </tr>
            </tbody>
            </table>",
            'status'  => 'Published',
            'created_at' => $date,
            'order' => 4,
        ]);
        DB::table('reviews')->insert([
            'id'          => '8',
            'name'        => 'Brett Wilson',
            'profile'     => '/static/2024/03/r8.png',
            'role'        => 'VP of Partner Operations',
            'company'        => 'Ethos',
            'body'        => "<table>
            <tbody>
            <td>
            <h4>What led you to work with Unique Star Cabinetry?</h4>
            How does a leader in risk and actuarial roles end up spearheading the expansion of a partner-driven sales business? If you’ve ever worked in growth companies that are disrupting entire industries, you go where the opportunities are - and there was a significant opportunity to expand our footprint beyond our direct to consumer offering. While I was an expert on our product, I recognized that it was critical to implement a proven approach to sell and onboard distribution partners, and their agents.
            </td>
            <td>
            <h4>How did the engagement go?</h4>
            We partnered with Unique Star Cabinetry to build out, operationalize, and drive adoption of an entirely new partner sales, expansion, and onboarding process from the ground up. It’s hard to quantify the impact as these foundational items are at the core of how we run our business day in and day out. What I’m most grateful for is Unique Star Cabinetry and John’s personal commitment to the development of our journey at Ethos which has empowered us to get one step closer to our mission of protecting more families with simple, affordable life insurance.
            </td>
            </tr>
            </tbody>
            </table>",
            'status'  => 'Published',
            'created_at' => $date,
            'order' => 3,
        ]);

        DB::table('reviews')->insert([
            'id'          => '9',
            'name'        => 'Staci Eyer (McMenimon)',
            'profile'     => '/static/2024/03/r9.png',
            'role'        => 'Head of Revenue Enablement',
            'company'        => 'Snappy',
            'body'        => "<table>
            <tbody>
            <td>
            <h4>What led you to work with Unique Star Cabinetry?</h4>
            While I was thrilled to be the first enablement hire at Snappy, I also recognized that the path to driving revenue impact was long and arduous. I was pleasantly surprised to learn that Unique Star Cabinetry was already intimately involved across numerous critical sales initiatives such as storytelling. Unique Star Cabinetry not only trained the entire field team, but spent time with each salesperson in order to coach and certify them.
            </td>
            <td>
            <h4>How did the engagement go?</h4>
            What impressed me the most was that John personally partnered with me to accelerate down that long and arduous path of building out the enablement function. We partnered on designing a competency framework model that became foundational to how we set expectations for new hires, promotion paths, and continued professional development. He regularly advised on key areas of concern for myself and the head of sales during the annual planning process. He became a trusted advisor to me, the sales leaders, and individual contributors through the insights he brought to every interaction.
            </td>
            </tr>
            </tbody>
            </table>",
            'status'  => 'Published',
            'created_at' => $date,
            'order' => 2,
        ]);

        DB::table('reviews')->insert([
            'id'          => '10',
            'name'        => 'Jay Sherman',
            'profile'     => '/static/2024/03/r10.png',
            'role'        => 'Sr Director, Sales Enablement',
            'company'        => 'Hackerone',
            'body'        => "<table>
            <tbody>
            <td>
            <h4>What led you to work with Unique Star Cabinetry?</h4>
            While I was thrilled to be the first enablement hire at Snappy, I also recognized that the path to driving revenue impact was long and arduous. I was pleasantly surprised to learn that Unique Star Cabinetry was already intimately involved across numerous critical sales initiatives such as storytelling. Unique Star Cabinetry not only trained the entire field team, but spent time with each salesperson in order to coach and certify them.
            </td>
            <td>
            <h4>How did the engagement go?</h4>
            What impressed me the most was that John personally partnered with me to accelerate down that long and arduous path of building out the enablement function. We partnered on designing a competency framework model that became foundational to how we set expectations for new hires, promotion paths, and continued professional development. He regularly advised on key areas of concern for myself and the head of sales during the annual planning process. He became a trusted advisor to me, the sales leaders, and individual contributors through the insights he brought to every interaction.
            </td>
            </tr>
            </tbody>
            </table>",
            'status'  => 'Published',
            'created_at' => $date,
            'order' => 1,
        ]);






        DB::table('metrics')->insert([
            'id'           => '1',
            'title'        => '$1 Billion',
            'icon'        => '/static/2023/12/tZzyFPqkEqx9ar17YRsRuX9Byfcc6uGTK7FxgCGP.svg',
            'description'  => 'in new business / upsell revenue impacted, and counting.',
            'status'       => 'Published',
            'order' => 3,
            'created_at' => $date,
        ]);

        DB::table('metrics')->insert([
            'id'           => '2',
            'title'        => '$5,000+',
            'icon'        => '/static/2023/12/NXqzdD4lfo1cPnnZEB1RXGHePWGPj2hXUywkjPMa.svg',
            'description'  => 'sales / marketing / customer success leaders and practitioners empowered.',
            'status'       => 'Published',
            'order' => 2,
            'created_at' => $date,
        ]);

        DB::table('metrics')->insert([
            'id'           => '3',
            'title'        => 'Less than 3 months',
            'icon'        => '/static/2023/12/fJ7n7c1WClSPDJx23jo7eTXOCEPKh11LPfej82LM.svg',
            'description'  => 'average time to deploy and deliver outcomes.',
            'status'       => 'Published',
            'order' => 1,
            'created_at' => $date,
        ]);


        DB::table('customers')->insert([
            'id'           => '1',
            'title'        => 'logo 01',
            'logo'         => '/static/2024/03/1.png',
            'status'       => 'Published',
            'order'        => 12,
            'created_at'   => $date,
        ]);
        DB::table('customers')->insert([
            'id'           => '2',
            'title'        => 'logo 02',
            'logo'         => '/static/2024/03/2.png',
            'status'       => 'Published',
            'order'        => 11,
            'created_at'   => $date,
        ]);
        DB::table('customers')->insert([
            'id'           => '3',
            'title'        => 'logo 03',
            'logo'         => '/static/2024/03/3.png',
            'status'       => 'Published',
            'order'        => 10,
            'created_at'   => $date,
        ]);
        DB::table('customers')->insert([
            'id'           => '4',
            'title'        => 'logo 04',
            'logo'         => '/static/2024/03/4.png',
            'status'       => 'Published',
            'order'        => 9,
            'created_at'   => $date,
        ]);
        DB::table('customers')->insert([
            'id'           => '5',
            'title'        => 'logo 05',
            'logo'         => '/static/2024/03/5.png',
            'status'       => 'Published',
            'order'        => 8,
            'created_at'   => $date,
        ]);
        DB::table('customers')->insert([
            'id'           => '6',
            'title'        => 'logo 06',
            'logo'         => '/static/2024/03/6.png',
            'status'       => 'Published',
            'order'        => 7,
            'created_at'   => $date,
        ]);
        DB::table('customers')->insert([
            'id'           => '7',
            'title'        => 'logo 07',
            'logo'         => '/static/2024/03/7.png',
            'status'       => 'Published',
            'order'        => 6,
            'created_at'   => $date,
        ]);
        DB::table('customers')->insert([
            'id'           => '8',
            'title'        => 'logo 08',
            'logo'         => '/static/2024/03/8.png',
            'status'       => 'Published',
            'order'        => 5,
            'created_at'   => $date,
        ]);
        DB::table('customers')->insert([
            'id'           => '9',
            'title'        => 'logo 09',
            'logo'         => '/static/2024/03/9.png',
            'status'       => 'Published',
            'order'        => 4,
            'created_at'   => $date,
        ]);
        DB::table('customers')->insert([
            'id'           => '10',
            'title'        => 'logo 10',
            'logo'         => '/static/2024/03/10.png',
            'status'       => 'Published',
            'order'        => 3,
            'created_at'   => $date,
        ]);
        DB::table('customers')->insert([
            'id'           => '11',
            'title'        => 'logo 11',
            'logo'         => '/static/2024/03/11.png',
            'status'       => 'Published',
            'order'        => 2,
            'created_at'   => $date,
        ]);


        DB::table('services')->insert([
            'id'           => '1',
            'title'        => 'Get the message right',
            'icon'        => '/static/2023/12/getthemessage.svg',
            'description'  => 'Deliver a message that drives urgency with buyers that can champion and fund your solution',
            'color'        => 'rgba(255,92,92, 1)',
            'status'       => 'Published',
            'order' => 5,
            'created_at' => $date,
        ]);

        DB::table('services')->insert([
            'id'          => '2',
            'title'        => 'Deploy a common sales OS',
            'icon'        => '/static/2023/12/deploy.svg',
            'description'        => 'Standardize on best-in-class methodologies (e.g. MEDDPICC, Sandler, Challenger) tailored to meet your specific needs',
            'color'        => 'rgba(73, 199, 240, 1)',
            'status'  => 'Published',
            'order' => 4,
            'created_at' => $date,
        ]);

        DB::table('services')->insert([
            'id'          => '3',
            'title'        => 'Don’t forget the product',
            'icon'        => '/static/2023/12/dN7HkJK18itNhvcARATyROtaOElUw7PkBlQIzPXl.svg',
            'description'        => 'Showcase your solution with self-serve demos that are interactive and value-based to accelerate the sales cycle',
            'color'        => 'rgba(255, 196, 107, 1)',
            'status'  => 'Published',
            'order' => 3,
            'created_at' => $date,
        ]);
        DB::table('services')->insert([
            'id'          => '4',
            'title'        => 'Systematically enable the team',
            'icon'        => '/static/2023/12/z5jZzSTeO8zC6EjjuRVZlCdF63TpMetIlZ53TBQG.svg',
            'description'        => 'Create world-class enablement programs needed to scale a high performance team',
            'color'        => 'rgba(73, 199, 240, 1)',
            'status'  => 'Published',
            'order' => 2,
            'created_at' => $date,
        ]);
        DB::table('services')->insert([
            'id'           => '5',
            'title'        => 'Activate your leaders',
            'icon'        => '/static/2023/12/2GmLq6pJZqbz3og8mfh4gu9RzcfYP73ospJB1xrW.svg',
            'description'  => 'Maximize leadership team potential through team-building workshops and formal coaching programs',
            'color'        => 'rgba(255,92,92, 1)',
            'status'       => 'Published',
            'order' => 1,
            'created_at' => $date,
        ]);


        // DB::table('services')->insert([
        //     'id'           => '6',
        //     'title'        => 'Analyze',
        //     'icon'        => '/assets/images/services/Analyze.svg',
        //     'description'  => 'Take stock of what’s working for you (and what’s not) along with opportunities for improvement through review of current content, analysis of sales funnel metrics, call reviews, and interviews with your sales team, marketing, customer success, and product team members',
        //     'color'        => 'rgba(73, 199, 240, 1)',
        //     'status'       => 'Published',
        //     'parent_id'       => 1,
        //     'order' => 13,
        //     'created_at' => $date,
        // ]);

        // DB::table('services')->insert([
        //     'id'           => '7',
        //     'title'        => 'Develop',
        //     'icon'        => '/assets/images/services/Develop.svg',
        //     'description'  => 'Build new messaging for sales conversations (e.g. first call deck) leveraging proven story-telling techniques that drive buyer engagement and urgency',
        //     'color'        => 'rgba(255, 196, 107, 1)',
        //     'status'       => 'Published',
        //     'parent_id'       => 1,
        //     'order' => 12,
        //     'created_at' => $date,
        // ]);



        // DB::table('services')->insert([
        //     'id'           => '8',
        //     'title'        => 'Enable',
        //     'icon'        => '/assets/images/services/Enable.svg',
        //     'description'  => 'Empower the field teams to apply the new messaging via interactive workshop training, roleplays and certifications',
        //     'color'        => 'rgba(255, 92, 92, 1)',
        //     'status'       => 'Published',
        //     'parent_id'       => 1,
        //     'order' => 11,
        //     'created_at' => $date,
        // ]);


        // DB::table('services')->insert([
        //     'id'           => '9',
        //     'title'        => 'Analyze',
        //     'icon'        => '/assets/images/services/Analyze-1.svg',
        //     'description'  => 'Understand your sales cycle characteristics such as velocity, win/loss reasons, and target customer segments (e.g. SMB, MidMarket, Enterprise)',
        //     'color'        => 'rgba(73, 199, 240, 1)',
        //     'status'       => 'Published',
        //     'parent_id'       => 2,
        //     'order' => 22,
        //     'created_at' => $date,
        // ]);


        // DB::table('services')->insert([
        //     'id'           => '10',
        //     'title'        => 'Enable leaders',
        //     'icon'        => '/assets/images/services/Enable-leaders.svg',
        //     'description'  => 'Empower 1st and 2nd line sales managers with the ability to inspect and coach to the methodology',
        //     'color'        => 'rgba(255, 196, 107, 1)',
        //     'status'       => 'Published',
        //     'parent_id'       => 2,
        //     'order' => 23,
        //     'created_at' => $date,
        // ]);

        // DB::table('services')->insert([
        //     'id'           => '11',
        //     'title'        => 'Tailor',
        //     'icon'        => '/assets/images/services/Tailor.svg',
        //     'description'  => 'Select and tailor industry-proven methodologies (e.g. MEDDPICC, Sandler, Challenger) based on findings from analysis',
        //     'color'        => 'rgba(73, 199, 240, 1)',
        //     'status'       => 'Published',
        //     'parent_id'       => 2,
        //     'order' => 24,
        //     'created_at' => $date,
        // ]);

        // DB::table('services')->insert([
        //     'id'           => '12',
        //     'title'        => 'Operationalize',
        //     'icon'        => '/assets/images/services/Operationalize.svg',
        //     'description'  => 'Update CRM system with methodology fields to track sales cycle progress and increase forecast accuracy',
        //     'color'        => 'rgba(255, 196, 107, 1)',
        //     'status'       => 'Published',
        //     'parent_id'       => 2,
        //     'order' => 25,
        //     'created_at' => $date,
        // ]);

        // DB::table('services')->insert([
        //     'id'           => '13',
        //     'title'        => 'Enable sellers',
        //     'icon'        => '/assets/images/services/Enable-sellers.svg',
        //     'description'  => 'Up-skill sellers with the expertise needed to deploy the methodology to increase win rates, deal value, and sales cycle velocity',
        //     'color'        => 'rgba(255, 92, 92, 1)',
        //     'status'       => 'Published',
        //     'parent_id'       => 2,
        //     'order' => 26,
        //     'created_at' => $date,
        // ]);


        // DB::table('services')->insert([
        //     'id'           => '14',
        //     'title'        => 'Analyze',
        //     'icon'        => '/assets/images/services/Analyze-2.svg',
        //     'description'  => 'Understand your offering, the competitive landscape, your target personas, and common use cases via primary research, interviews, and guided workshops',
        //     'color'        => 'rgba(73, 199, 240, 1)',
        //     'status'       => 'Published',
        //     'parent_id'       => 3,
        //     'order' => 32,
        //     'created_at' => $date,
        // ]);

        // DB::table('services')->insert([
        //     'id'           => '15',
        //     'title'        => 'Develop',
        //     'icon'        => '/assets/images/services/Develop-1.svg',
        //     'description'  => 'Create interactive and compelling story and value based demos in digital format that can easily be shared with the prospect before, during, and after meetings',
        //     'color'        => 'rgba(255, 196, 107, 1)',
        //     'status'       => 'Published',
        //     'parent_id'       => 3,
        //     'order' => 31,
        //     'created_at' => $date,
        // ]);


        // DB::table('services')->insert([
        //     'id'           => '16',
        //     'title'        => 'Build from scratch',
        //     'icon'        => '/assets/images/services/Build-from-scratch.svg',
        //     'description'  => 'In the absence of dedicated enablement staff, we’ll take the lead on building out your enablement framework and programs, hire your first enablement team members, and coach them to success',
        //     'color'        => 'rgba(255, 92, 92, 1)',
        //     'status'       => 'Published',
        //     'parent_id'       => 4,
        //     'order' => 42,
        //     'created_at' => $date,
        // ]);


        // DB::table('services')->insert([
        //     'id'           => '17',
        //     'title'        => 'Partner with your team',
        //     'icon'        => '/assets/images/services/Partner-with-your-team.svg',
        //     'description'  => 'Collaborate with your enablement staff to deploy a programmatic approach to enablement programs such as onboarding',
        //     'color'        => 'rgba(73, 199, 240, 1)',
        //     'status'       => 'Published',
        //     'parent_id'       => 4,
        //     'order' => 41,
        //     'created_at' => $date,
        // ]);

        // DB::table('services')->insert([
        //     'id'           => '18',
        //     'title'        => 'Align GTM revenue leadership team',
        //     'icon'        => '/assets/images/services/Align-GTM-revenue-leadership-team.svg',
        //     'description'  => 'For newly formed senior leadership teams and/or organizations embarking on a change journey, we will facilitate an intensive 2 day workshop to develop the critical foundations of success for leadership teams leveraging proven leadership and communication approaches including 5 Dysfunctions of a Team, Radical Candor, and more',
        //     'color'        => 'rgba(255, 196, 107, 1)',
        //     'status'       => 'Published',
        //     'parent_id'       => 5,
        //     'order' => 52,
        //     'created_at' => $date,
        // ]);

        // DB::table('services')->insert([
        //     'id'           => '19',
        //     'title'        => 'Invest in your managers',
        //     'icon'        => '/assets/images/services/Invest-in-your-managers.svg',
        //     'description'  => 'Roll out a coaching program to help your front line managers effectively coach and get the most out of every team members',
        //     'color'        => 'rgba(255, 92, 92, 1)',
        //     'status'       => 'Published',
        //     'parent_id'       => 5,
        //     'order' => 51,
        //     'created_at' => $date,
        // ]);




        DB::table('services')->insert([
            'id'           => '6',
            'title'        => 'Understand what’s working (and what’s not)',
            'icon'        => '/static/2023/12/getthemessage.svg',
            'description'  => 'Provide recommendations based on review of current content, call recordings, funnel metrics, and interviews',
            'color'        => 'rgba(73, 199, 240, 1)',
            'status'       => 'Published',
            'parent_id'       => 1,
            'order' => 15,
            'created_at' => $date,
        ]);

        DB::table('services')->insert([
            'id'           => '7',
            'title'        => 'Develop messaging',
            'icon'        => '/static/2023/12/getthemessage.svg',
            'description'  => 'Craft new messaging that drives sales momentum and conversations (e.g. first call deck)',
            'color'        => 'rgba(73, 199, 240, 1)',
            'status'       => 'Published',
            'parent_id'       => 1,
            'order' => 14,
            'created_at' => $date,
        ]);

        DB::table('services')->insert([
            'id'           => '8',
            'title'        => 'Empower sellers',
            'icon'        => '/static/2023/12/getthemessage.svg',
            'description'  => 'Interactive workshops, roleplays, and certifications to drive messaging adoption',
            'color'        => 'rgba(73, 199, 240, 1)',
            'status'       => 'Published',
            'parent_id'       => 1,
            'order' => 13,
            'created_at' => $date,
        ]);

        DB::table('services')->insert([
            'id'          => '9',
            'title'        => 'Determine your objectives',
            'icon'        => '/static/2023/12/deploy.svg',
            'description'        => 'Understand sales goals and sales cycle characteristics such as deal velocity, win/loss, market segmentation',
            'color'        => 'rgba(73, 199, 240, 1)',
            'status'  => 'Published',
            'parent_id'       => 2,
            'order' => 18,
            'created_at' => $date,
        ]);

        DB::table('services')->insert([
            'id'          => '10',
            'title'        => 'Select methodology',
            'icon'        => '/static/2023/12/deploy.svg',
            'description'        => 'Select and tailor industry-proven methodologies (e.g. MEDDICC, Sandler, Challenger) to meet your objectives',
            'color'        => 'rgba(73, 199, 240, 1)',
            'status'  => 'Published',
            'parent_id'       => 2,

            'order' => 17,
            'created_at' => $date,
        ]);

        DB::table('services')->insert([
            'id'          => '11',
            'title'        => 'Operationalize and enable sellers',
            'icon'        => '/static/2023/12/deploy.svg',
            'description'        => 'Update CRM and up-skill sellers',
            'color'        => 'rgba(73, 199, 240, 1)',
            'status'  => 'Published',
            'parent_id'       => 2,

            'order' => 16,
            'created_at' => $date,
        ]);


        DB::table('services')->insert([
            'id'          => '12',
            'title'        => 'Highlight the product',
            'icon'        => '/static/2023/12/dN7HkJK18itNhvcARATyROtaOElUw7PkBlQIzPXl.svg',
            'description'        => 'Determine key points in the sales cycle where product demos are critical',
            'color'        => 'rgba(255, 196, 107, 1)',
            'status'  => 'Published',
            'parent_id'       => 3,

            'order' => 21,
            'created_at' => $date,
        ]);

        DB::table('services')->insert([
            'id'          => '13',
            'title'        => 'Deliver the best demo, everytime',
            'icon'        => '/static/2023/12/dN7HkJK18itNhvcARATyROtaOElUw7PkBlQIzPXl.svg',
            'description'        => 'Create interactive story and value-based demos in digital format that can be shared with prospects before, during and after meetings',
            'color'        => 'rgba(255, 196, 107, 1)',
            'status'  => 'Published',
            'parent_id'       => 3,

            'order' => 20,
            'created_at' => $date,
        ]);

        DB::table('services')->insert([
            'id'          => '14',
            'title'        => 'Measure and refine',
            'icon'        => '/static/2023/12/dN7HkJK18itNhvcARATyROtaOElUw7PkBlQIzPXl.svg',
            'description'        => 'Track demo engagement analytic to improve conversion',
            'color'        => 'rgba(255, 196, 107, 1)',
            'status'  => 'Published',
            'parent_id'       => 3,

            'order' => 19,
            'created_at' => $date,
        ]);

        DB::table('services')->insert([
            'id'          => '15',
            'title'        => 'Know exactly where the gaps are',
            'icon'        => '/static/2023/12/z5jZzSTeO8zC6EjjuRVZlCdF63TpMetIlZ53TBQG.svg',
            'description'        => 'Understand the skills gap that is needed for high performance',
            'color'        => 'rgba(73, 199, 240, 1)',
            'status'  => 'Published',
            'parent_id'       => 4,
            'order' => 24,
            'created_at' => $date,
        ]);

        DB::table('services')->insert([
            'id'          => '16',
            'title'        => 'Prioritize and develop enablement programs',
            'icon'        => '/static/2023/12/z5jZzSTeO8zC6EjjuRVZlCdF63TpMetIlZ53TBQG.svg',
            'description'        => 'Build out targeted enablement programs in a way that’s repeatable and scalable',
            'color'        => 'rgba(73, 199, 240, 1)',
            'status'  => 'Published',
            'parent_id'       => 4,
            'order' => 23,
            'created_at' => $date,
        ]);

        DB::table('services')->insert([
            'id'          => '17',
            'title'        => 'Train the trainer',
            'icon'        => '/static/2023/12/z5jZzSTeO8zC6EjjuRVZlCdF63TpMetIlZ53TBQG.svg',
            'description'        => 'Partner with your enablement team',
            'color'        => 'rgba(73, 199, 240, 1)',
            'status'  => 'Published',
            'parent_id'       => 4,
            'order' => 22,
            'created_at' => $date,
        ]);

        DB::table('services')->insert([
            'id'           => '18',
            'title'        => 'Assess the leadership team',
            'icon'        => '/static/2023/12/2GmLq6pJZqbz3og8mfh4gu9RzcfYP73ospJB1xrW.svg',
            'description'  => 'Leverage surveys (quant) and interviews (qual) to assess key leadership attributes',
            'color'        => 'rgba(255,92,92, 1)',
            'status'       => 'Published',
            'parent_id'       => 5,
            'order' => 27,
            'created_at' => $date,
        ]);

        DB::table('services')->insert([
            'id'           => '19',
            'title'        => 'Facilitate in-person workshop',
            'icon'        => '/static/2023/12/2GmLq6pJZqbz3og8mfh4gu9RzcfYP73ospJB1xrW.svg',
            'description'  => 'Intensive 2 day workshop leveraging proven approaches including 5 Dysfunctions of a Team, Radical Candor, and more',
            'color'        => 'rgba(255,92,92, 1)',
            'status'       => 'Published',
            'parent_id'       => 5,
            'order' => 26,
            'created_at' => $date,
        ]);

        DB::table('services')->insert([
            'id'           => '20',
            'title'        => 'Reinforce and measure progress',
            'icon'        => '/static/2023/12/2GmLq6pJZqbz3og8mfh4gu9RzcfYP73ospJB1xrW.svg',
            'description'  => 'Follow up coaching and quarterly assessments of key leadership attributes',
            'color'        => 'rgba(255,92,92, 1)',
            'status'       => 'Published',
            'parent_id'       => 5,
            'order' => 25,
            'created_at' => $date,
        ]);



        DB::table('posts')->insert([
            'created_at' => $date,
            'id'        => '1',
            'intro_image'        => '/assets/images/post1.jpg',
            'title'      => 'about the web design process',
            'slug'      => 'about_the_web_design_process',
            'description'      => "<p>Hello! I’d be happy to assist you with an article about PHP.</p><p>PHP, which stands for Hypertext Preprocessor, is an open-source scripting language that is primarily used for web development. It was originally designed in 1994 by Rasmus Lerdorf as a set of Common Gateway Interface (CGI) scripts, but it later became a standalone language. Today, PHP is used by over 79% of all websites whose server-side programming language is known.</p><p>One of the main advantages of PHP is its simplicity. It is easy to learn and write, making it ideal for beginners. At the same time, it is a very powerful language that can be used to create complex web applications. PHP can be used for a wide range of tasks, including database management, creating dynamic web pages, and handling user input.</p><p>PHP is also highly customizable. It can be used with a variety of different frameworks, such as Laravel and CodeIgniter, which provide developers with pre-built code templates and libraries to make web development faster and easier. In addition, there are thousands of extensions and packages available for PHP, which makes it easy to add new features to your web application.</p><p>Despite its many advantages, PHP is not without its flaws. One of the main criticisms of PHP is that it can be difficult to write secure code. Because of its popularity, PHP has become a common target for hackers and malware. As a result, developers must be vigilant about security and constantly update their code to protect against vulnerabilities.</p><p>Overall, however, PHP remains one of the most popular and widely used scripting languages for web development. Its combination of simplicity, power, and flexibility make it an ideal choice for creating dynamic and engaging web applications.</p>",
            'summary'       => 'PHP, which stands for Hypertext Preprocessor, is an open-source scripting language that is primarily used for web development.',
            'status'  => 'Published',
            'author'  => 'John Hsieh',
            'meta_title'  => 'about the web design process',
            'meta_description' => 'PHP, which stands for Hypertext Preprocessor, is an open-source scripting language that is primarily used for web development.',
        ]);

        DB::table('posts')->insert([
            'created_at' => $date,
            'id'        => '2',
            'intro_image'        => '/assets/images/post2.jpg',
            'title'      => 'about PHP',
            'slug'      => 'about_PHP',
            'description'      => "<p>Sure, I can write an article about the web design process.</p><p>Designing a website involves several stages, and its goal is to create a program that helps you provide information to your users quickly and easily. In the following, we will discuss the planning, execution, evaluation, and maintenance of a website.</p><p>• Planning: In this stage, we focus on planning a website. We need to define the main idea and put the site's structure in place.             </p>            <p>The planning steps include:</p>            <ul>                 <li>1. Gathering information related to the website</li>                <li>2. Analyzing the website's goals and audience</li>                <li>3. Designing plans for the necessary infrastructure, technical and financial aspects of building the website</p><p>• Execution: After planning, website hosting (volume, bandwidth, and essential services) becomes available. The main design and creation stage is in this stage using HTML, CSS, JS files and images. We can divide these steps into three parts:</li>                <li>1. Design a dynamic programming language like PHP and a database</li>                <li>2. Create the main control entry point to the pages</li>                <li>3. Design graphic sections using CSS</li>                </ul>                <p>• Evaluation: You need to evaluate your website and make sure it operates correctly. For this purpose, you need to check the website pages, loading speed, compatibility with different browsers, and many other aspects.</p><p>• Maintenance: Freshness and the latest information on your website are essential, and this is a continuous process. You need to keep your website up-to-date and pay attention to creating updates such as images, tags, and new content.</p><p>Finally, designing and developing a website is very complex, and each stage is determined based on your needs and your user's needs. As a website designer and developer, you should be responsive and always strive to improve and update your website.</p>",
            'summary'       => 'Designing a website involves several stages, and its goal is to create a program that helps you provide information to your users quickly and easily.',
            'status'  => 'Published',

            'author'  => 'John Hsieh',
            'meta_title'  => 'about PHP',
            'meta_description' => 'Designing a website involves several stages, and its goal is to create a program that helps you provide information to your users quickly and easily. ',
        ]);

        DB::table('post_post_tag')->insert([
            'post_tag_id'         => '2',
            'post_id'             => '2',

        ]);

        DB::table('posts')->insert([
            'created_at' => $date,
            'id'        => '3',
            'intro_image'        => '/assets/images/post3.jpg',
            'title'      => 'Marketing: A Key to Business Success and test long title test test test test test',
            'slug'      => 'Marketing_A_Key_to_Business_Success',
            'description'      => "<p>Marketing: A Key to Business Success</p><p>Marketing plays a crucial role in determining the success of any business. It is the process of identifying, anticipating, and satisfying customer needs and wants through the creation, promotion, and distribution of products or services. Effective marketing strategies can help businesses increase their customer base, build brand awareness, and increase their revenue. In this article, you will learn more about the importance of marketing and how it can help your business grow.</p><p>Importance of Marketing</p><p>Marketing is essential for any business, regardless of its size or industry. Here are some reasons why marketing is important:</p><ol><li><p>Builds brand awareness: Marketing helps establish a brand image and create awareness about the products or services offered by a business. This can increase the number of customers and improve brand recognition.</p></li><li><p>Identifies target audience: Effective marketing strategies help identify the target audience and their needs, enabling businesses to tailor their offerings to meet those needs.</p></li><li><p>Increases customer base: Marketing campaigns can attract new customers and help retain existing ones. It helps businesses to develop a loyal customer base, which can ultimately lead to increased revenue.</p></li><li><p>Differentiates from competitors: Marketing helps differentiate a business from its competitors by highlighting the unique features and benefits of its products or services.</p></li><li><p>Generates revenue: Effective marketing strategies can increase sales and generate revenue for a business. This is vital in sustaining a business in the long term.</p></li></ol><p>Marketing Strategies</p><p>There are many marketing strategies that businesses can adopt to promote their products or services. Here are some of the most effective ones:</p><ol><li><p>Content marketing: This involves creating valuable content to attract and engage potential customers. It includes blog posts, social media posts, and other forms of media.</p></li><li><p>Email marketing: This involves sending promotional emails to customers and prospects. It is an effective way to build relationships and promote products or services.</p></li><li><p>Search engine optimization (SEO): This involves optimizing a website to rank higher in search engine results pages (SERPs). It can help attract more traffic to a website and increase its visibility.</p></li><li><p>Pay-per-click (PPC) advertising: This involves paying for ads that appear on search engines or social media platforms. It is an effective way to reach targeted audiences and increase website traffic.</p></li><li><p>Social media marketing: This involves promoting products or services on social media platforms such as Facebook, Twitter, and Instagram. It can help businesses engage with their customers and build brand awareness.</p></li></ol><p>Conclusion</p><p>Marketing is the backbone of any successful business. It helps businesses attract new customers, build brand awareness, and increase revenue. Effective marketing strategies can differentiate a business from its competitors, generate sales, and ultimately lead to business success. Therefore, it is essential for businesses to invest in marketing to grow and succeed.</p>",
            'summary'       => 'Marketing plays a crucial role in determining the success of any business. It is the process of identifying, anticipating,',
            'status'  => 'Published',

            'author'  => 'John Hsieh',
            'meta_title'  => 'meta_title',

            'meta_description' => 'meta_description',

        ]);



        DB::table('posts')->insert([
            'created_at' => $date,
            'id'        => '4',
            'intro_image'        => '/assets/images/post4.jpg',
            'title'      => 'Python',
            'slug'      => 'python',
            'description'      => "<p>Python, developed in the late 1980s, is one of the most popular high-level languages in use today. It is an interpreted, dynamically-typed, and object-oriented language that is widely used in web development, data analysis, automation, and artificial intelligence. Its readability and simplicity make it a favorite among programmers of all skill levels, and its large community ensures that its frameworks, libraries, and tools are always innovative and up-to-date.            One of the main advantages of Python is its ease of use. Its syntax is simple and intuitive, making it easy to write and understand code. Additionally, its dynamic nature means that variables do not have to be declared before use, which simplifies the writing process even further. As a result, Python code tends to be shorter and more concise than other languages, making it faster to write and easier to read and maintain.                        Python is also an incredibly versatile language, with applications ranging from web development to scientific computing. Its popularity in data analysis and machine learning is largely due to its vast array of specialized libraries, such as NumPy and SciPy, which enable fast array and matrix computations. In addition, libraries such as TensorFlow and Pytorch provide powerful tools for deep learning and neural network development.                        One of the strengths of Python is the extensive range of frameworks available. Popular frameworks such as Flask and Django provide comprehensive web development environments, while tools such as Pandas and Matplotlib enable effective data analysis and visualization. These frameworks and tools are designed to work out of the box, and they integrate seamlessly with Python code.                        Overall, Python's simplicity, versatility, and community support make it an ideal choice for developers of all levels. Its elegant syntax and powerful libraries make it an excellent option for beginners starting in programming or experienced developers seeking to streamline their workflow. With its continued popularity, its features and capabilities will only continue to grow in the years to come.</p>",
            'summary'       => 'Python, developed in the late 1980s, is one of the most popular high-level languages in use today. It is an interpreted,',
            'status'  => 'Published',

            'author'  => 'John Hsieh',
            'meta_title'  => 'meta_title',

            'meta_description' => 'meta_description',

        ]);



        DB::table('posts')->insert([
            'created_at' => $date,
            'id'        => '5',
            'intro_image'        => '/assets/images/post1.jpg',
            'title'      => 'java',
            'slug'      => 'java',
            'description'      => "<p>java</p>",
            'summary'       => 'java',
            'status'  => 'Published',

            'author'  => 'John Hsieh',
            'meta_title'  => 'meta_title',
            'published_at' => $date,
            'meta_description' => 'meta_description',

        ]);




        DB::table('posts')->insert([
            'created_at' => $date,
            'id'        => '6',
            'intro_image'        => '/assets/images/post2.jpg',
            'title'      => 'javascript',
            'slug'      => 'javascript',
            'description'      => "<p>javascript</p>",
            'summary'       => 'javascript',
            'status'  => 'Published',

            'author'  => 'John Hsieh',
            'meta_title'  => 'meta_title',

            'meta_description' => 'meta_description',

        ]);



        DB::table('posts')->insert([
            'created_at' => $date,
            'id'        => '7',
            'intro_image'        => '/assets/images/post3.jpg',

            'title'      => 'css',
            'slug'      => 'css',
            'description'      => "<p>css</p>",
            'summary'       => 'css',
            'status'  => 'Published',

            'author'  => 'John Hsieh',
            'meta_title'  => 'meta_title',

            'meta_description' => 'meta_description',

        ]);


        DB::table('posts')->insert([
            'created_at' => $date,
            'id'        => '8',
            'intro_image'        => '/assets/images/post4.jpg',
            'title'      => 'html',
            'slug'      => 'html',
            'description'      => "<p>html</p>",
            'summary'       => 'html',
            'status'  => 'Published',

            'author'  => 'John Hsieh',
            'meta_title'  => 'meta_title',

            'meta_description' => 'meta_description',

        ]);

        DB::table('posts')->insert([
            'created_at' => $date,
            'id'        => '9',
            'intro_image'        => '/assets/images/post1.jpg',
            'title'      => 'react',
            'slug'      => 'react',
            'description'      => "<p>react</p>",
            'summary'       => 'react',
            'status'  => 'Published',

            'author'  => 'John Hsieh',
            'meta_title'  => 'meta_title',

            'meta_description' => 'meta_description',

        ]);




        DB::table('posts')->insert([
            'created_at' => $date,
            'id'        => '10',
            'intro_image'        => '/assets/images/post2.jpg',
            'title'      => 'vue',
            'slug'      => 'vue',
            'description'      => "<p>vue</p>",
            'summary'       => 'vue',
            'status'  => 'Published',
            'author'  => 'John Hsieh',
            'meta_title'  => 'meta_title',
            'meta_description' => 'meta_description',

        ]);



        DB::table('posts')->insert([
            'created_at' => $date,
            'id'        => '12',
            'intro_image'        => '/assets/images/post3.jpg',
            'title'      => 'c#',
            'slug'      => 'c',
            'description'      => '<p>The European languages are members of the same family. Their separate existence is a myth.            For science, music, sport, etc, Europe uses the same <a href="#">vocabulary</a>. The            languages only differ in their grammar, their pronunciation and their most common words.</p>        <p>Everyone realizes why a new common language would be desirable: one could refuse to pay            expensive translators. To achieve this, it <mark>would be</mark> necessary to have uniform            grammar, pronunciation and more common words.</p>        <figure class="figure">            <img src="images/posts/post-lg-2.jpg" class="figure-img img-fluid rounded" alt="...">            <figcaption class="figure-caption text-center">A caption for the above image.</figcaption>        </figure>        <p>The languages only differ in their grammar, their pronunciation and their most common words.            Everyone realizes why a new common language would be desirable.</p>        <img src="images/posts/single-sm-1.jpg" class="rounded alignleft" alt="...">        <p>One could refuse to pay expensive translators. To achieve this, it would be necessary to have            uniform grammar, pronunciation and more common words.</p>        <p>If several languages coalesce, the grammar of the resulting language is more simple and            regular than that of the individual languages. The new common language will be more simple            and regular than the existing <a href="#">European languages</a>. It will be as simple            as Occidental; in fact, it will be Occidental.</p>        <p>A collection of textile samples lay spread out on the table - Samsa was a travelling salesman            - and above it there hung a picture that he had recently cut out of an illustrated magazine            and housed in a nice, gilded frame.</p>        <h4>I should be incapable of drawing a single stroke</h4>        <ul>            <li>How about if I sleep a little bit</li>            <li>A collection of textile samples lay spread out</li>            <li>His many legs, pitifully thin compared with</li>            <li>He lay on his armour-like back</li>            <li> Gregor Samsa woke from troubled dreams</li>        </ul>        <p>To an English person, it will seem like simplified <a href="#">English</a>, as a            skeptical Cambridge friend of mine told me what Occidental is. The European languages are            members of the same family. Their separate existence is a myth. For science, music, sport,            etc, Europe uses the same vocabulary.</p>    ',
            'summary'       => 'The European languages are members of the same family. Their separate existence is a myth.',
            'status'  => 'Published',
            'author'  => 'John Hsieh',
            'meta_title'  => 'c#',
            'meta_description' => 'The European languages are members of the same family. Their separate existence is a myth.',
        ]);


        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}